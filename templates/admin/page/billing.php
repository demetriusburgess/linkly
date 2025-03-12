<?php 

$ROOTPATH = "{$_SERVER['DOCUMENT_ROOT']}/linkly/";

if (!defined('ABSPATH')) {
    require("{$ROOTPATH}templates/404.php");
    die('');
}

include( ABSPATH . 'admin/template/header-dashboard.php'); ?>

<section style="padding-top: 120px;">
    <div class="container-fluid ps-0">
        <div class="row">
            <div class="col-2">
                <!-- <ul>
                    <p>Workspace Settings</p>
                    <li>General</li>
                    <li>Domains</li>
                    <li>Tags</li>
                    <li>Billing</li>
                    <li>People</li>
                    <li>Integrations</li>
                    <li>Security</li>
                    <p>Developer Settings</p>
                    <li>API Keys</li>
                    <li>OAuth Apps</li>
                    <p>Account Settings</p>
                    <li>Notifications</li>
                </ul> -->
                <?php include('sidebar.php'); ?>
            </div>
            <div class="col-10">
                <div class="card mb-3 border-danger">
                    <div class="card-header text-body-secondary hstack px-5 border-danger">
                        <div class="">
                            <h2>Plan & Usage</h2>
                            <p class="m-0">Only lowercase letters, numbers, and dashes. Max 48 characters</p>
                        </div>
                    </div>
                    <div class="card-body p-5">
                        <h5 class="card-title">Delete Workspace</h5>
                        <p class="card-text">Permanently delete your workspace, custom domain, and all associated links + their stats. This action cannot be undone - please proceed with caution.</p>
                    </div>
                    <div class="card-footer text-body-secondary hstack px-5 border-danger">
                        Only lowercase letters, numbers, and dashes. Max 48 characters
                        <a href="#" class="btn btn-danger ms-auto">Delete Workspaces</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>