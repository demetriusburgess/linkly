<?php require("header.php"); ?>
<main>
    <?php
        get_hero([
            'id' => 'home-hero',
            'subtitle' => 'Easy link shortening',
            'title' => 'RX short URL & QR code generator',
            'message' => 'A short link allows you to collect so much data about your customers and their behavior.',
            'url' => '',
        ]); 
    ?>

<section id="<?php echo $content['id']?>" class="hero hero-tall">
    <div class="container">
<!-- <div class="_container _grid _grid--max-res-2 _grid--ultra-res-2 _grid--hi-res-2 _grid--xl-2 _grid--lg-2 _grid--md-2"> -->
        <div class="row justify-content-center">
            <div class="content col-6">
                <div class="hero-content text-center">
                    <p class="pill-heading fs-6 fw-bold text-uppercase _color--secondary-1 _bkgrd--secondary-102"><?php echo $content['subtitle']?></p>
                    <h1 class="fs-1 fw-bold text-uppercase _color--tertiary-1"><?php echo $content['title']?></h1>
                    <!-- <p class="_fnt--paragraph-1 _fnt--reg _color--tertiary-1"><?php echo $content['message']?></p> -->
                    <p class="fs-5 fw-normal _color--tertiary-1"><?php echo $content['message']?></p>
                </div>
                <form method="post" class="bar-form" action="shorten.php">
                    <input type="text" name="long-url" id="" class="fs-5 _color--tertiary-1" placeholder="https://stubbylink.com/register">
                    <input type="hidden" name="urlmeta" value="">
                    <button class="btn btn-primary rounded-pill fs-5 fw-bold text-uppercase _color--basic-white">Shorten</button>      
                </form>
                <div class="mt-4">
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
                    <?php for ($i=0;$i<2;$i++): ?>
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
                    <?php endfor; ?>
                </div>
            </div>
            <!-- <div class="img col-6">
                <img src="dist/img/hero-home.png" alt="">
            </div> -->
        </div>
    </div>
</section>

    
    <?php include('cta-banner.php'); ?>
</main>

<?php require("footer.php"); ?>
