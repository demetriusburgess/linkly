<?php
declare(strict_types=1);

$ROOTPATH = "{$_SERVER['DOCUMENT_ROOT']}/linkly/";

if (!defined('ABSPATH')) {
    require("{$ROOTPATH}templates/404.php");
    die('');
}

function validateURL(string $url):bool {
    // Regular expression pattern to match URL
    $pattern = '/^(https?:\/\/)?' .                 // Protocol (optional)
                '([a-z0-9-]+\.)+[a-z]{2,}(:\d+)?' . // Domain
                '([\/?].*)?$/i';                    // Path (optional)
    
    // Check if the URL matches the pattern
    if (preg_match($pattern, $url)) {
        return true; // Valid URL
    } else {
        return false; // Invalid URL
    }
}

function sanitize(string ...$str) {
    $values = [...$str];

    $sanitized = array_map(function($val) {
        $dirty = $val === null ? NULL : trim($val);
        $clean = $dirty === null ? NULL : htmlspecialchars($dirty);

        return $clean;
    },$values);

    return $sanitized;
}

function create_link(string $url, array $options = [], DatabaseHandler $db) {
    $base = '100000000000';
    $base62 = new Tuupola\Base62;

    if (validateURL($url)) {
        $last_key = $db->last_key()->fetch_assoc();
        
        if (!$last_key) {
            $link_key = $base + 1;
        } else {
            $link_key = $last_key['link_key'] + 1;
        }
        
        $link_hash = $base62->encodeInteger($link_key);
        $link =$db->get_link($link_hash)->fetch_assoc();
        
        if (!$link) {
            $new_url = 'www.stubbylink.com/' . $link_hash;
            $stored_url = htmlspecialchars(trim($url));

            $db->add_link([
                // 'short_id' => rand(1, 100),
                'short_id' => $link_hash,
                'short_url' => $new_url,
                'destination_url'=> $stored_url,
                'title'=> isset($options['title']) ? $options['title'] : '',
                'url_metadata'=> isset($options['url_metadata']) ? $options['url_metadata'] : '',
                'icon'=> isset($options['icon']) ? $options['icon'] : '',
                'creator'=> isset($options['creator']) ? $options['creator'] : '',
                'tags'=> isset($options['tages']) ? $options['tages'] : '',
                'analytics'=> isset($options['analytics']) ? $options['analytics'] : '',
                'qr_code'=> isset($options['qr_code']) ? $options['qr_code'] : '',
                'archived'=> isset($options['archived']) ? $options['archived'] : FALSE,
                'comments'=> isset($options['comments']) ? $options['comments'] : '',
                'utm_referal'=> isset($options['utm_referal']) ? $options['utm_referal'] : NULL,
                'utm_source'=> isset($options['utm_source']) ? $options['utm_source'] : NULL,
                'utm_medium'=> isset($options['utm_medium']) ? $options['utm_medium'] : NULL,
                'utm_campaign'=> isset($options['utm_campaign']) ? $options['utm_campaign'] : NULL,
                'utm_term'=> isset($options['utm_term']) ? $options['utm_term'] : NULL,
                'utm_content'=> isset($options['utm_content']) ? $options['utm_content'] : NULL,
                'user_id'=> isset($options['user_id']) ? $options['user_id'] : NULL ]);
            
            $db->add_key([
                'link_key' => $link_key, 
                'link_hash' => $link_hash]);
        }
    }
}

function start() {
    require(ABSPATH . '/vendor/autoload.php');

    start_db();
}

function start_db() {
    global $db;

    require(ABSPATH . SRC . 'Database/db.php');


    if ( isset( $db ) ) {
        return;
    }

    $dbuser     = defined( 'DB_USER' ) ? DB_USER : '';
    $dbpassword = defined( 'DB_PASSWORD' ) ? DB_PASSWORD : '';
    $dbname     = defined( 'DB_NAME' ) ? DB_NAME : '';
    $dbhost     = defined( 'DB_HOST' ) ? DB_HOST : '';

    // $db = new wpdb( $dbuser, $dbpassword, $dbname, $dbhost );

    $db = new DatabaseHandler([
        'host' =>  $dbhost,
        'database' => $dbname,
        'username' => $dbuser,
        'password' => $dbpassword,
    ]);

    $db->connect();
    $db->create_tables();

    // $links = $db->get_links();

    // create_link("https://newlook.com", $db);

    // $db->add_user([
    //     'user_id' => rand(1, 100),
    //     'email' => 'test@email.com',
    //     'password' => NULL,
    //     'user_metadata' => 'JSON[{}]',
    // ]);
}
?>