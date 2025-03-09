<header class="table-header" style="padding:0;">
    <nav class="hstack">
        <p class="fs-1 fw-bold" href="#">Links</p>
        <form class="d-flex ms-auto" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <!-- <button class="btn btn-outline-primary" type="submit">Search</button> -->
        </form>
        <div class="dropdown">
            <a class="btn btn-outline-secondary border me-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-filter me-2"></i>Filter
            </a>
            <ul class="dropdown-menu shadow">
                <li>
                    <form class="d-flex mx-2" role="search">
                        <input class="form-control" type="search" placeholder="Filter..." aria-label="Search">
                        <!-- <button class="btn btn-outline-primary" type="submit">Search</button> -->
                    </form>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-globe me-2"></i>Domain</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-tag me-2"></i>tag</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Creator</a></li>
            </ul>
        </div>
        <div class="dropdown m-0">
            <a class="btn btn-outline-secondary border me-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-toggles2 me-2"></i>Display
            </a>
            <ul class="dropdown-menu shadow" style="width:400px;">
                <div class="hstack">
                    <button class="btn btn-outline-secondary border w-50 ms-2 me-1">
                        <i class="bi bi-layout-three-columns"></i>
                        <br/>
                        Cards
                    </button>
                    <button class="btn btn-outline-secondary border w-50 ms-1 me-2">
                        <i class="bi bi-table"></i>
                        <br/>
                        Rows
                    </button>
                </div>
                <li><hr class="dropdown-divider"></li>
                <li class="hstack">
                    <h5 class="dropdown-header">
                    <!-- <h5 class="w-50 mx-2"> -->
                        <i class="bi bi-arrow-down-up mx-2"></i>
                        Ordering
                    </h5>
                </li>
                <li class="hstack">
                    <button class="btn btn-outline-secondary border ms-2 me-1">
                        <!-- <i class="bi bi-sort-down"></i> -->
                        Date Added
                    </button>
                    <button class="btn btn-outline-secondary border ms-1 me-1">
                        <!-- <i class="bi bi-sort-down"></i> -->
                        Numver of clicks
                    </button>
                    <button class="btn btn-outline-secondary border ms-1 me-2">
                        <!-- <i class="bi bi-sort-down"></i> -->
                        Last Clicked
                    </button>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="hstack">
                    <p class="ms-2"><i class="bi bi-archive me-2"></i>Show archived links</p>
                    <form action="" class="ms-auto">
                        <div class="form-check form-switch">
                            <input class="form-check-input fs-4" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="form-check-label visually-hidden" for="flexSwitchCheckDefault"><i class="bi bi-archive me-2"></i>Show archived links</label>
                        </div>
                    </form>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <p class="mx-2 dropdown-item-text">Display Properties</p>
                    <form action="" class="mx-2">
                        <input id="display-icon" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-secondary border me-2 mb-2" for="display-icon">Icon</label>

                        <input id="display-short-link" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-secondary border me-2 mb-2" for="display-short-link">Short Link</label>

                        <input id="display-dest-url" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-secondary border me-2 mb-2" for="display-dest-url">Destination URL</label>

                        <input id="display-title" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-secondary border me-2 mb-2" for="display-title">Title</label>

                        <input id="display-description" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-secondary border me-2 mb-2" for="display-description">Description</label>

                        <input id="display-created" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-secondary border me-2 mb-2" for="display-created">Created Date</label>

                        <input id="display-creator" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-secondary border me-2 mb-2" for="display-creator">Creator</label>

                        <input id="display-tags" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-secondary border me-2 mb-2" for="display-tags">Tags</label>

                        <input id="display-analytics" type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off">
                        <label class="btn btn-outline-secondary border mb-2" for="display-analytics">Analtytics</label>
                    </form>
                </li>
            </ul>
        </div>
        <div class="">
            <button class="btn btn-primary me-4" href="#" role="button" data-bs-toggle="modal" data-bs-target="#create-link-modal">Create Link</button>
        </div>
        <div class="dropdown">
            <a class="nav-link _dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots text-primary rounded-3 fs-3 fw-bold"></i>
            </a>
            <ul class="dropdown-menu shadow">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </nav>
</header>