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
            <div class="col-2">
                <ul>
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
                </ul>
            </div>
            <div class="col-10">
                <?php 
                    $cards = [
                        'name' => [
                            'title' => "Workplace Name", 
                            'subtitle' => "This is the name of your workspace.",
                            'meta' => "Max 32 characters."
                        ],
                        'slug' => [
                            'title' => "Workplace Slug", 
                            'subtitle' => "This is your workspace\'s unique slug.",
                            'meta' => "Only lowercase letters, numbers, and dashes. Max 48 characters"
                        ],
                        'id' => [
                            'title' => 'Wordplace Id', 
                            'subtitle' => "Unique ID of your workspaceg.",
                            'meta' => "Learn more about Workspace ID"
                        ],
                        'Log' => [
                            'title' => 'Workplace Logo', 
                            'subtitle' => "This is your workspace's logo.",
                            'meta' => "Square image recommended. Accepted file types: .png, .jpg. Max file size: 2MB."
                        ],
                    ];

                    foreach($cards as $card => $data): 
                ?>
                <div class="card mb-3">
                    <div class="card-body p-5">
                        <h5 class="card-title"><?php echo $data['title']; ?></h5>
                        <p class="card-text"><?php echo $data['subtitle']; ?></p>
                        <input name="link-utm-checked" class="form-control fs-4" type="text" role="switch" id="flexSwitchCheckDefault" data-bs-toggle="collapse" data-bs-target="#link-utm-collapse" aria-expanded="false" aria-controls="link-utm-collapse">
                    </div>
                    <div class="card-footer text-body-secondary hstack px-5">
                        <?php echo $data['meta']; ?>
                        <a href="#" class="btn btn-primary ms-auto">Save Changes</a>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="card mb-3 border-danger">
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