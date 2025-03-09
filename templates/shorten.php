<?php
require('./private/db/db.php');
require('./vendor/autoload.php');


$base = '100000000000';
$base62 = new Tuupola\Base62;

$dbh = new DatabaseHandler([
    'host' => 'mysql.demetriusburgess.com',
    'database' => 'linkly',
    'username' => 'dburgess923',
    'password' => 'Faction3',
]);


function validateURL($url) {
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


if (str_contains($_POST['urlmeta'], 'superhuman')) {
    if (validateURL($_POST['long-url'])) {
        $last_key = $dbh->last_key()->fetch_assoc();
        
        if (!$last_key) {
            $link_key = $base + 1;
        } else {
            $link_key = $last_key['link_key'] + 1;
        }
        
        $link_hash = $base62->encodeInteger($link_key);
        $link = $dbh->get_link($link_hash)->fetch_assoc();
        
        if (!$link) {
            $new_url = 'www.stubbylink.com/' . $link_hash;
            $stored_url = htmlspecialchars(trim($_POST['long-url']));
            $meta = str_replace($_POST['urlmeta'], 'superhuman', '');
            
            $add_link = $dbh->add_link($link_hash, $new_url,  $stored_url, $meta, NULL);
            $dbh->add_key($link_key, $link_hash);

            echo "Shortened URL: " . $new_url;
        }
    }
}

?>