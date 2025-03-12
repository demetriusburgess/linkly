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
                <!-- <div class="hstack">
                    <h2>Tags</h2>
                </div> -->
                <header class="table-header" style="padding:0;">
                    <nav class="hstack">
                        <p class="fs-1 fw-bold" href="#">Tags</p>
                        <div class="ms-auto">
                            <button class="btn btn-primary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#create-link-modal">Add Tag</button>
                        </div>
                    </nav>
                </header>
                <ul class="list-group">
                    <?php foreach (['Tag 1', 'tag 2', 'tag 3'] as $tag): ?>
                    <li class="list-group-item list-group-item-action">
                        <div class="hstack">
                            <p class="position-absolute start-0 end-0 z-1 mx-0" style="line-height: 3; padding: 8px 16px;" role="button" data-bs-toggle="modal" data-bs-target="#create-link-modal">An item</p>
                            <div class="text-end hstack ms-auto z-3">
                                <button class="btn btn-outline-primary boder-1 ms-auto">
                                    <i class="bi bi-hand-index-thumb"></i>
                                    <span><?php echo $link['analytics']; ?></span>
                                    <span>links</span>
                                </button>
                                <div class="dropdown ms-3" style="right: 0px; background: transparent;" >
                                    <a class="nav-link _dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots text-primary rounded-3 fs-3 fw-bold"></i>
                                    </a>
                                    <ul class="dropdown-menu shadow">
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3"></i>Edit</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-clipboard me-3"></i>Copy Tag ID</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-x-circle me-3"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <? endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="create-link-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index:9999; backdrop-filter: blur(5px);">
    <form action="" method="post" class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Tag</h1><br />
            <!-- <p class="muted fs-5">Use tags to organize your links.</p> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tag Name</label>
                <input type="text"  name="link-destination-url" class="form-control" id="exampleFormControlInput1" placeholder="Featured">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tag color</label>
                
                <div class="w-100">
                    <input type="radio" class="btn-check" name="options" id="option1" autocomplete="off" checked>
                    <label class="btn fs-6 btn-outline-primary" for="option1">Blue</label>
    
                    <input type="radio" class="btn-check" name="options" id="option2" autocomplete="off">
                    <label class="btn fs-6 btn-outline-success" for="option2">Green</label>
    
                    <input type="radio" class="btn-check" name="options" id="option3" autocomplete="off">
                    <label class="btn fs-6 btn-outline-danger" for="option3">Red</label>
    
                    <input type="radio" class="btn-check" name="options" id="option4" autocomplete="off">
                    <label class="btn fs-6 btn-outline-warning" for="option4">Yellow</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Tag</button>
        </div>
        </div>
    </form>
</div>