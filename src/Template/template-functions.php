<?php
declare(strict_types=1);

$ROOTPATH = "{$_SERVER['DOCUMENT_ROOT']}/linkly/";

if (!defined('ABSPATH')) {
    require("{$ROOTPATH}templates/404.php");
    die('');
}

function get_template_part(string $slug, string $name = "", array $args = [], bool $load_once = false):bool {
    if ($slug === '') return false;

    $template = $name !== '' ? "{$slug}-{$name}.php" : "{$slug}.php";
    
    return locate_template($template, true, $load_once, $args) !== '';
}


function locate_template(string $name, bool $load = false, bool $load_once = true, array $args):string {
    $path = ABSPATH . "templates/{$name}";

    if (file_exists($path)) {
        if ($load) {
            load_template($path, $load_once, $args);
        }
        return $path;
    }

    return '';
}

function load_template(string $filename, bool $load_once = true, array $args = []):void  {
    extract($args); // Make args available as variables in the template

    if ($load_once) {
        require_once($filename);
    } else {
        require($filename);
    }

}

function get_hero(string $name = "", array $args = []):void {
    $default_content = [
        'title' => '',
        'subtitle' => '',
        'message' => '',
        'url' => '',
    ];

    $data = array_replace_recursive($default_content, $args);

    get_template_part("hero", $name, $data);
}

function get_header(string $name = "", array $args = []):void {    
    get_template_part("header", $name, $args, true);  
}

function get_footer(string $name = "", array $args = []):void {    
    get_template_part("footer", $name, $args, true);  

}


?>