<?php 

$ROOTPATH = "{$_SERVER['DOCUMENT_ROOT']}/linkly/";

if (!defined('ABSPATH')) {
    require("{$ROOTPATH}templates/404.php");
    die('');
}

get_header("template");
get_template_part("admin/template/header-dashboard", "", []); 

?>

<section style="padding-top: 200px;">
    <div class="container">
        <div class="row">
            <?php get_template_part("admin/template/card-table", "", []); ?>
        </div>
    </div>
</section>

<?php get_footer("template"); ?>