<?php 
function linkcard($blank = false) {
    if ($blank && ($blank === true || $blank === 'true')) {
        return <<<HTML
            <div class="card shadow mb-4 border-0">
                <span class="card-body rounded-4">
                    <div class="row">
                        <div class="col-1">
                            <div class="p-3 rounded-5 bg-secondary"></div>
                        </div>
                        <div class="col-11">
                            <div class="h-25 w-25 mb-2 bg-secondary"></div>
                            <div class="h-25 w-50 bg-secondary"></div>
                        </div>
                        <!-- <div class="col-3 text-end">
                            <button class="border-0 position-absolute top-50 translate-middle" style="right: 0px; background: transparent;">
                                <i class="bi bi-three-dots text-primary rounded-3 fs-3 fw-bold"></i>
                            </button>
                        </div> -->
                    </div>
                </span>
            </div>
        HTML;
    }

    return <<<HTML
        <div class="card shadow mb-4 border-0">
            <span class="card-body rounded-5">
                <div class="row">
                    <div class="col-1">
                        <div class="p-3 rounded-5 bg-secondary"></div>
                    </div>
                    <div class="col-11">
                        <span class="fs-6 fw-normal text-muted m-0 w-100 d-inline-block">stb.co/try</span>
                        <span class="fs-6 fw-normal text-muted m-0 w-100 d-inline-block">stubbylink.com/register</span>
                    </div>
                    <div class="col-3 text-end">
                        <button class="border-0 position-absolute top-50 translate-middle" style="right: 0px; background: transparent;">
                            <i class="bi bi-three-dots text-seconary rounded-3 fs-3 fw-bold"></i>
                        </button>
                    </div>
                </div>
            </span>
        </div>
    HTML;
}