<?php 

$ROOTPATH = '/home/dburgess923/dev.demetriusburgess.com/linkly/';

if (!defined('ABSPATH')) {
    require($ROOTPATH . '404.php');
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