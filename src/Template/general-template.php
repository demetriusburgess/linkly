<?php
declare(strict_types=1);

$ROOTPATH = "{$_SERVER['DOCUMENT_ROOT']}/linkly/";

if (!defined('ABSPATH')) {
    require("{$ROOTPATH}templates/404.php");
    die('');
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