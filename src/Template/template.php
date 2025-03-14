<?php

declare(strict_types=1);

$ROOTPATH = "{$_SERVER['DOCUMENT_ROOT']}/linkly/";

if (!defined('ABSPATH')) {
    require("{$ROOTPATH}templates/404.php");
    die('');
}

class TemplateEngine
{
    protected string $templatePath;
    protected array $components = [];
    protected array $allowedFunctions = [
        'strtolower', 'strtoupper', 'count', 'strlen', 'ucfirst', 'implode', 'htmlspecialchars'
    ];
    protected array $filters = [];
    protected array $macros = [];
    protected array $includeStack = [];
    protected int $maxIncludeDepth = 5;

    public function __construct(string $templatePath)
    {
        $this->templatePath = rtrim($templatePath, '/');
    }

    // Register a custom component (function call)
    public function registerComponent(string $name, callable $callback)
    {
        $this->components[$name] = $callback;
    }

    // Register a custom filter
    public function registerFilter(string $name, callable $callback)
    {
        $this->filters[$name] = $callback;
    }

    // Register a custom macro
    public function registerMacro(string $name, callable $callback)
    {
        $this->macros[$name] = $callback;
    }

    // Escape function to prevent XSS
    protected function escape($value)
    {
        if (is_string($value)) {
            return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        if (is_array($value)) {
            return array_map([$this, 'escape'], $value);
        }
        return $value;
    }

    // Locate the template file on the file system
    public function locate_template(string $name, bool $load = false, array $args = []): string {
        $path = $this->templatePath . "/{$name}";
        if (file_exists($path)) {
            if ($load) {
                $this->load_template($path, $args);
            }
            return $path;
        }
        return '';
    }

    // Load the template file and make the variables from $args available
    public function load_template(string $filename, array $args = []):void  {
        extract($args); // Make args available as variables in the template
    
        if ($load_once) {
            require_once($filename);
        } else {
            require($filename);
        }
    
    }

    // Get and load a specific part of the template (modular approach)
    public function get_template_part(string $slug, string $name = ''): void {
        // Build the template path based on the provided slug and name
        $template = "{$slug}-{$name}.php";
        $path = $this->locate_template($template);

        if (!$path) {
            // Try without the name (fallback)
            $template = "{$slug}.php";
            $path = $this->locate_template($template);
        }

        if ($path) {
            $this->load_template($path);
        }
    }

    // Render a template
    public function render(string $template, array $data = []): string {
        $template = preg_replace('/[^a-zA-Z0-9_-]/', '', $template);
        $file = realpath("{$this->templatePath}/{$template}.php");

        if (!$file || strpos($file, $this->templatePath) !== 0) {
            throw new Exception("Invalid template path");
        }

        $content = file_get_contents($file);

        // Handle includes with recursion protection
        $content = preg_replace_callback('/{{\s*include\([\'"](.+?)[\'"]\)\s*}}/', function($matches) use ($data) {
            $includeFile = preg_replace('/[^a-zA-Z0-9_-]/', '', $matches[1]);
            $includePath = realpath("{$this->templatePath}/{$includeFile}.php");

            if (!$includePath || strpos($includePath, $this->templatePath) !== 0) {
                throw new Exception("Invalid include path");
            }

            if (in_array($includePath, $this->includeStack)) {
                throw new Exception("Recursive include detected for {$includeFile}");
            }

            if (count($this->includeStack) >= $this->maxIncludeDepth) {
                throw new Exception("Max include depth reached");
            }

            $this->includeStack[] = $includePath;
            $output = $this->render($includeFile, $data); // Pass data for child templates
            array_pop($this->includeStack);

            return $output;
        }, $content);

        // Handle macros and components
        $content = preg_replace_callback('/{{\s*(\w+)\((.*?)\)\s*}}/', function($matches) use ($data) {
            $component = $matches[1];
            $params = str_getcsv($matches[2]);

            // Map params with data
            $params = array_map(function($param) use ($data) {
                return $this->mapParamToData($param, $data);
            }, $params);

            // Check if it's a registered macro or component
            if (isset($this->macros[$component])) {
                return call_user_func_array($this->macros[$component], $params);
            } elseif (isset($this->components[$component])) {
                return call_user_func_array($this->components[$component], $params);
            } elseif (in_array($component, $this->allowedFunctions)) {
                return call_user_func($component, $params[0] ?? '');
            }

            return '';
        }, $content);

        // Handle filters
        $content = preg_replace_callback('/{{\s*\$([\w]+)\s*\|\s*(\w+)\s*}}/', function($matches) use ($data) {
            $key = trim($matches[1]);
            $filterName = trim($matches[2]);

            if (isset($this->filters[$filterName])) {
                $value = $data[$key] ?? '';
                return call_user_func($this->filters[$filterName], $value);
            }

            return $data[$key] ?? '';
        }, $content);

        // Handle variables
        $content = preg_replace_callback('/{{\s*\$([\w]+(?:\[[^\]]+\])*)\s*}}/', function($matches) use ($data) {
            return $this->getVariableValue($matches[1], $data);
        }, $content);

        // Handle control structures like if, else, for, foreach, etc.
        $content = $this->handleControlStructures($content);

        // Output the template
        $tmpFile = tempnam(sys_get_temp_dir(), 'tpl_');
        file_put_contents($tmpFile, $content);

        extract($data, EXTR_SKIP);
        ob_start();
        include $tmpFile;
        $output = ob_get_clean();

        unlink($tmpFile); // Clean up temp file

        return $output;
    }

    // Helper methods
    private function mapParamToData(string $param, array $data) {
        // Process parameters with variable mapping
        if (preg_match('/^\$([\w]+)$/', $param, $varMatch)) {
            return $data[$varMatch[1]] ?? '';
        } elseif (preg_match('/^\$([\w]+)\[(.*?)\]$/', $param, $varMatch)) {
            $varName = $varMatch[1];
            $key = $varMatch[2];
            return $data[$varName][$key] ?? '';
        }
        return trim($param, "\"'"); // Handle non-variable params
    }

    private function getVariableValue(string $key, array $data) {
        $parts = explode('[', str_replace(']', '', $key));
        $value = $data;

        foreach ($parts as $part) {
            if (isset($value[$part])) {
                $value = $value[$part];
            } else {
                return '';
            }
        }

        return $this->escape($value);
    }

    private function handleControlStructures(string $content) {
        // Replace control structures with PHP syntax
        $content = preg_replace('/{{\s*if\s+(.+?)\s*}}/', '<?php if ($1): ?>', $content);
        $content = preg_replace('/{{\s*else\s*}}/', '<?php else: ?>', $content);
        $content = preg_replace('/{{\s*elseif\s+(.+?)\s*}}/', '<?php elseif ($1): ?>', $content);
        $content = preg_replace('/{{\s*endif\s*}}/', '<?php endif; ?>', $content);
        $content = preg_replace('/{{\s*for\s+(.+?)\s*}}/', '<?php for ($1): ?>', $content);
        $content = preg_replace('/{{\s*endfor\s*}}/', '<?php endfor; ?>', $content);
        $content = preg_replace('/{{\s*foreach\s+(.+?)\s*}}/', '<?php foreach ($1): ?>', $content);
        $content = preg_replace('/{{\s*endforeach\s*}}/', '<?php endforeach; ?>', $content);

        return $content;
    }
}


// Example Usage:
/*
$template = new TemplateEngine(__DIR__ . '/templates');

// Register Components
$template->registerComponent('Button', function($label, $type) {
    return "<button class='btn {$type}'>{$label}</button>";
});

// Register Macros
$template->registerMacro('alert', function($message, $type) {
    return "<div class='alert alert-{$type}'>{$message}</div>";
});

// Register Filters
$template->registerFilter('escape', function($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
});

// Render Template
echo $template->render('example', [
    'title' => ['main' => 'Welcome to My Site'],
    'isAdmin' => true,
    'message' => 'This is a custom alert!'
]);
*/

// Example Template (in templates/example.php)
/*
{{ include('header') }}
<h1>{{$title['main']}}</h1>
{{ alert($message, 'info') }}
{{ if $isAdmin }}
    <p>Welcome, Admin!</p>
{{ else }}
    <p>Welcome, User!</p>
{{ endif }}
*/


