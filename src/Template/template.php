<?php

declare(strict_types=1);

$ROOTPATH = "{$_SERVER['DOCUMENT_ROOT']}/linkly/";

if (!defined('ABSPATH')) {
    require("{$ROOTPATH}templates/404.php");
    die('');
}


function get_template_part(string $slug, string $name, array $args, bool $load_once = false):bool {
    if ("" === $slug) return false;

    if ("" !== $name) {
        $template = "{$slug}-{$name}.php";
    } else {
        $template = "{$slug}.php";
    }
    
    if (!locate_template($template, true, $load_once, $args)) {
        return true;
    }

    return false;
}


function locate_template(string $name, bool $load = false, bool $load_once = true, array $args):string {
    $location = "";

    if (file_exists(ABSPATH . "templates/{$name}")) {
        $location = ABSPATH . "templates/{$name}";
    }

    if ($load && "" !== $location) {
        load_template($location, $load_once, $args);
    }
    
    return $location;
}

function load_template(string $filename, bool $load_once = true, array $args = []):void  {
    global $db; 

    if ($load_once) {
        require_once($filename);
    } else {
        require($filename);
    }

}

?>