<?php 
/**
 * Stores the location of directory of functions, classes, and core content.
 *
 */
define('SRC','src/');

require( ABSPATH . SRC . 'Functions/functions.php');
require( ABSPATH . SRC . 'Template/template.php');
require( ABSPATH . SRC . 'Template/template-functions.php');
require( ABSPATH . SRC . 'Routing/router.php');
require( ABSPATH . 'templates/components/nav.php');
require( ABSPATH . 'templates/components/linkcard.php');
require( ABSPATH . 'templates/components/linkform.php');
require( ABSPATH . 'templates/components/form-input.php');
require( ABSPATH . 'templates/components/form-button.php');
?>