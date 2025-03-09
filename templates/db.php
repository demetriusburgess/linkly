<?php
require('./private/db/db.php');
require('./vendor/autoload.php');


$base = '100000000000';
$base62 = new Tuupola\Base62;

$dbh = new DatabaseHandler([
    'host' => '',
    'database' => '',
    'username' => '',
    'password' => '',
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
    if (validateURL($_POST['lurl'])) {
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
            $stored_url = htmlspecialchars(trim($_POST['lurl']));
            $meta = str_replace($_POST['urlmeta'], 'superhuman', '');
            
            $add_link = $dbh->add_link($link_hash, $new_url,  $stored_url, $meta, NULL);
            $dbh->add_key($link_key, $link_hash);
        }
    }
}

?>
<?php require('header.php'); ?>
<main style="padding-top: 150px; padding-bottom: 150px;">
    <section id="short-link-list" class="">
        <table>
            <thead>
                <tr>
                    <th>short links</th>
                    <td>link id</td>
                    <td>long url</td>
                    <td>short url</td>
                    <td>url meta</td>
                    <td>user id</td>
                </tr>
            </thead>
            <tbody>
            <?php //var_dump("result",$dbh->get_links()->fetch_assoc()); ?>
            <?php  
                $link_list = $dbh->get_links();
                for ($i = 0; $i < $link_list->num_rows; $i++):
                    $link_list->data_seek($i);
                    $result = $link_list->fetch_assoc();
            ?>
            <tr>
                <th></th>
                <td><?php echo $result['short_id']; ?></td>     
                <td><?php echo $result['short_url']; ?></td>     
                <td><?php echo $result['long_url']; ?></td>     
                <td><?php echo $result['url_metadata']; ?></td>     
                <td><?php echo $result['user_id']; ?></td>
            </tr> 
            <?php endfor; ?>
            </tbody>
        </table>
        <form action="" method="POST">
            <input type="text" name="lurl" id="" placeholder="long url">
            <input type="text" name="urlmeta" id="" placeholder="url meta">
            <button>Submit</button>
        </form>
    </section>
</main>
<?php require('footer.php'); ?>