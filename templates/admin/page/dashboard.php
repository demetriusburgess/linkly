<?php 

$ROOTPATH = "{$_SERVER['DOCUMENT_ROOT']}/linkly/";

if (!defined('ABSPATH')) {
    require("{$ROOTPATH}templates/404.php");
    die('');
}

include( ABSPATH . 'admin/template/header-dashboard.php'); ?>

<section style="padding-top: 200px;">
    <div class="container">
        <div class="row">
            <?php include('admin/template/card-table.php'); ?>
        </div>
    </div>
</section>