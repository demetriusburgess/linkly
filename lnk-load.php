<?php
/**
 * Load application enviroment, then display app
 */

if (!isset($did_load)) {
    $did_load = true; 

    require('lnk-config.php'); 
    
    global $db;
    
    start();

    require( ABSPATH . 'templates/app.php');

    // echo "template";
}

?>