<?php //require("header.php"); ?>
<?php get_header(); ?>
<main>
    <?php
        get_hero("", [
            'id' => 'home-hero',
            'subtitle' => 'Easy link shortening',
            // 'title' => 'RX short URL & QR code generator',
            'title' => $title,
            'message' => 'A short link allows you to collect so much data about your customers and their behavior.',
            'url' => '',
        ]);
    ?>
</main>

<?php // require("footer.php"); ?>
<?php get_footer(); ?>
