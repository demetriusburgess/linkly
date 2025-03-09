<?php 
/**
 * The base configuration
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 */

//  echo "test";

/** Load environment variables */
if (file_exists('.env')) {
    foreach(parse_ini_file('.env') as $var => $val) {
        putenv("$var=$val");
    }
}

// ** Database settings ** //
/** Database name */
define( 'DB_NAME',getenv('DB_NAME'));

/** Database username */
define( 'DB_USER',getenv('DB_USER'));

/** Database password */
define( 'DB_PASSWORD',getenv('DB_PASSWORD'));

/** Database hostname */
define( 'DB_HOST',getenv('DB_HOST'));

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET',getenv('DB_CHARSET'));


/** Main directory of this install */
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__FILE__) . '/');
}

require(ABSPATH . 'lnk-settings.php'); 

?>