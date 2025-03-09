<div class="table-body">
    <?php 
    global $db;

    $link_list = $db->get_links();

    for ($i = 0; $i < $link_list->num_rows; $i++):
        $link_list->data_seek($i);
        $link = $link_list->fetch_assoc();

    // for ($i=0;$i<10;$i++): 
    ?>
        <div class="card shadow-sm mb-4 border-1">
            <span class="card-body">
                <div class="hstack">
                    <div class="rounded-5 bg-primary me-3" style="width:40px;height:40px;"></div>
                    <div class="col-8">
                        <div>
                            <a href="#" class="fs-6 fw-normal m-0 text-primary text-decoration-none fs-6"><?php echo $link['short_url']; ?></a>
                            <button class="btn fs-6 text-primary rounded-5"><i class="bi bi-clipboard"></i></button>
                        </div>
                        <div class="hstack">
                            <a href="#" class="fs-6 fw-normal m-0 text-secondary text-decoration-none"><i class="bi bi-arrow-return-right me-2"></i><span class="text-muted"><?php echo $link['destination_url']; ?></span></a>
                            <div class="fs-6 boder-1 rounded-5 bg-primary mx-3 border-1" style="width:25px;height:25px; background-image: url(https://dubassets.com/avatars/cm0ozzfd80000114qwc1iqvgg_IiBdNO2); background-size:cover;"></div>
                            <span class="fs-6 mx-2"><?php echo date("M d Y", strtotime($link['created_at'])); ?></span>
                        </div>
                    </div>
                    <div class="text-end hstack ms-auto">
                        <button class="btn btn-outline-primary boder-1 ms-auto">
                            <i class="bi bi-hand-index-thumb"></i>
                            <span><?php echo $link['analytics']; ?></span>
                            <span>clicks</span>
                        </button>
                        <div class="dropdown ms-3" style="right: 0px; background: transparent;" >
                            <a class="nav-link _dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots text-primary rounded-3 fs-3 fw-bold"></i>
                            </a>
                            <ul class="dropdown-menu shadow">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-pencil-square me-3"></i>Edit</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-qr-code me-3"></i>QR Code</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-copy me-3"></i>Duplicate</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-clipboard me-3"></i>Copy Link ID</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-archive me-3"></i>Archive</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-folder-check me-3"></i>Transfer</a></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-x-circle me-3"></i>Delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </span>
        </div>
    <?php endfor; ?>
</div>