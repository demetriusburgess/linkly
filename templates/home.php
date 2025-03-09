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
    <section class="home-features" style="padding-top: 3rem; padding-bottom: 5rem;">
        <div class="container">
            <div class="row gy-5">
                <div class="col-12 text-center">
                    <h2 class="fs-2 fw-bold">Features</h2>
                    <p class="fs-5 fw-normal">Enhance your links with advanced customizations and detailed statistics.</p>
                </div>
                <?php 
                    $features = [
                        ['Custom Aliases', 'bi bi-alphabet'],
                        ['Branded domains', 'bi bi-globe2'],
                        ['Statistics', 'bi bi-graph-up'],
                        ['Retargeting pixels', 'bi bi-image'],
                        ['Traffic splitting', 'bi bi-arrow-repeat'],
                        ['Password protection', 'bi bi-lock'],
                        ['Country targeting', 'bi bi-flag'],
                        ['Platform targeting', 'bi bi-pc-display'],
                        ['Language targeting', 'bi bi-globe'],
                        ['UTM builder', 'bi bi-gear-wide-connected'],
                        ['Expiration dates', 'bi bi-calendar4-event'],
                        ['QR codes', 'bi bi-qr-code']
                    ];

                    for ($i=0;$i<sizeof($features);$i++): 
                ?>
                <div class="col-4">
                    <div class="card shadow border-0 rounded-4">
                        <div class="card-body">
                            <i class="<?php echo $features[$i][1]; ?> text-bg-primary p-2 me-3 rounded-3 fs-6 fw-bold" style="display: inline;"></i><h3 class="card-title fs-5 fw-bold _color--tertiary-1" style="display: inline;"><?php echo $features[$i][0]; ?></h3>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>
    <!-- <section id="home-posibilities" class="">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="intro col-12">
                    <h2 class="fs-2 fw-bold _fnt--center _color--tertiary-1">One short link, infinite possibilities</h2>
                    <p class="fs-5 fw-normal _fnt--center _color--tertiary-1">A shortlink is a powerful marketing tool when you use it carefully. It is not just a link, but a medium between you customer and their desitination.</p>
                </div>
                <div class="col-4">
                    <div class="card shadow border-0" style="height:100%;">
                        <div class="card-body">
                            <img src="dist/img/icon-4.png" alt="">
                            <h3 class="card-title fs-4 fw-bold _color--tertiary-1">Smart Targeting</h3>
                            <p class="card-text fs-5 fw-normal _color--tertiary-1">Tartget your customer to increase your reach and redirect them to a relevant page. Add a pixel to retarget them in your social media ad campaign to capture them.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow border-0" style="height:100%;">
                        <div class="card-body">
                            <img src="dist/img/icon-2.png" alt="">
                            <h3 class="card-title fs-4 fw-bold _color--tertiary-1">In-Depth Analtytics</h3>
                            <p class="card-text fs-5 fw-normal _color--tertiary-1">Share your link to your network and measure data to optimize your marketing campaign's performance. Reach an audience that meets your needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card shadow border-0" style="height:100%;">
                        <div class="card-body">
                            <img src="dist/img/icon-1.png" alt="">
                            <h3 class="card-title fs-4 fw-bold _color--tertiary-1">Digital Experience</h3>
                            <p class="card-text fs-5 fw-normal _color--tertiary-1">use various powerful tools, increase conversion and provide a non-intrusive experience to your customers without disenganging them.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section id="home-link-management" class="pt-5 pb-5" style="background-color: #f7f7f7;">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <div class="mb-5">
                        <h2 class="fs-2 fw-bold m-0">Link management</h2>
                        <p class="fs-5 fw-normal text-muted m-0">Complete link management platform to brand, track and share your short links.</p>
                    </div>
                    <div>
                        <div class="mb-4">
                            <div class="row">
                                <div  class="col-1">
                                    <i class="bi bi-link text-bg-primary p-2 mt-2 rounded-3 fs-4 fw-bold" style="display: inline-block;"></i>
                                </div>
                                <div  class="col-10">
                                    <h3 class="fs-4 fw-bold m-0 ps-3">Links</h3>
                                    <p class="fs-5 fw-normal text-muted m-0 ps-3">Shorten, share, and export your links with our advanced set of features.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                <div  class="col-1">
                                    <i class="bi bi-ui-radios-grid text-bg-primary p-2 me-3 mt-2 rounded-3 fs-4 fw-bold" style="display: inline-block;"></i>
                                </div>
                                <div  class="col-10">
                                    <h3 class="fs-4 fw-bold m-0 ps-3">Spaces</h3>
                                    <p class="fs-5 fw-normal text-muted ps-3">Group your links and keep them well organized through custom spaces. </p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="row">
                                <div class="col-1">
                                    <i class="bi bi-globe2 text-bg-primary p-2 me-3 mt-2 rounded-3 fs-4 fw-bold" style="display: inline-block;"></i>
                                </div>
                                <div class="col-10">
                                    <h3 class="fs-4 fw-bold m-0 ps-3">Domains</h3>
                                    <p class="fs-5 fw-normal text-muted ps-3 m-0">Brand your links with your domains, inspire trust and increase your click-through rate.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 offset-1">
                    <div>
                        <?php for ($i=0;$i<4;$i++): ?>
                        <div class="card shadow mb-4 border-0">
                            <span class="card-body">
                                <div class="row">
                                    <div class="col-1">
                                        <div class="p-3 rounded-5 bg-primary"></div>
                                    </div>
                                    <div class="col-8">
                                        <p class="fs-6 fw-normal m-0">example.com/b6vxe</p>
                                        <p class="fs-6 fw-normal m-0">Consectetur - Adipiscing</p>
                                    </div>
                                    <div class="col-3 text-end">
                                        <button class="border-0 position-absolute top-50 translate-middle" style="right: 0px; background: transparent;">
                                            <i class="bi bi-three-dots text-primary rounded-3 fs-3 fw-bold"></i>
                                        </button>
                                    </div>
                                </div>
                            </span>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="home-link-management" class="pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-5 offset-1 order-2">
                    <div class="mb-5">
                        <h2 class="fs-2 fw-bold m-0">Statistics</h2>
                        <p class="fs-5 fw-normal text-muted m-0">Get to know your audience with our detailed statistics and better understand the performance of your links, while also being GDPR, CCPA and PECR compliant.</p>
                    </div>
                    <ul class="row" style="list-style: none; padding: 0px;">
                        <?php 
                            $features = [
                                ['Overview', 'bi bi-reception-3'],
                                ['Referrers', 'bi bi-link'],
                                ['Countries', 'bi bi-flag'],
                                ['Cities', 'bi bi-buildings'],
                                ['Languages', 'bi bi-globe'],
                                ['Platforms', 'bi bi-pc-display'],
                                ['Browsers', 'bi bi-window-stack'],
                                ['Devices', 'bi bi-phone'],
                            ];

                            for ($i=0;$i<sizeof($features);$i++): 
                        ?>
                        <li class="mb-4 col-5">
                            <i class="<?php echo $features[$i][1]; ?> text-bg-primary p-2 me-3 rounded-3 fs-6 fw-bold" style="display: inline;"></i><h3 class="fs-4 fw-bold m-0 _color--tertiary-1" style="display: inline;"><?php echo $features[$i][0]; ?></h3>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </div>
                <div class="col-6 order-1">
                    <div>
                        <div class="card shadow mb-4 border-0">
                            <span class="card-body">
                                <div class="hstack">
                                    <p class="fs-6 fw-normal m-0">United States</p>
                                    <p class="fs-6 fw-normal ms-auto">57</p>
                                </div>  
                                <div class="progress mt-2" role="progressbar" aria-label="Example 1px high" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                                    <div class="progress-bar" style="width: 57%"></div>
                                </div>
                            </span>
                        </div>
                        <div class="card shadow mb-4 border-0">
                            <span class="card-body">
                                <div class="hstack">
                                    <p class="fs-6 fw-normal m-0">Windows</p>
                                    <p class="fs-6 fw-normal ms-auto">21</p>
                                </div>  
                                <div class="progress mt-2" role="progressbar" aria-label="Example 1px high" aria-valuenow="21" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                                    <div class="progress-bar" style="width: 21%"></div>
                                </div>
                            </span>
                        </div>
                        <div class="card shadow mb-4 border-0">
                            <span class="card-body">
                                <div class="hstack">
                                    <p class="fs-6 fw-normal m-0">Chrome</p>
                                    <p class="fs-6 fw-normal ms-auto">76</p>
                                </div>  
                                <div class="progress mt-2" role="progressbar" aria-label="Example 1px high" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                                    <div class="progress-bar" style="width: 76%"></div>
                                </div>
                            </span>
                        </div>
                        <div class="card shadow mb-4 border-0">
                            <span class="card-body">
                                <div class="hstack">
                                    <p class="fs-6 fw-normal m-0">Mobile</p>
                                    <p class="fs-6 fw-normal ms-auto">67</p>
                                </div>  
                                <div class="progress mt-2" role="progressbar" aria-label="Example 1px high" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                                    <div class="progress-bar" style="width: 67%"></div>
                                </div>
                            </span>
                        </div>
                        <div class="card shadow mb-4 border-0">
                            <span class="card-body">
                                <div class="hstack">
                                    <p class="fs-6 fw-normal m-0">Desktop</p>
                                    <p class="fs-6 fw-normal ms-auto">21</p>
                                </div>  
                                <div class="progress mt-2" role="progressbar" aria-label="Example 1px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                                    <div class="progress-bar" style="width: 25%"></div>
                                </div>
                            </span>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="home-integrations" class="" style="background-color: #f7f7f7;">
        <div class="container">
            <div class="row">
                <div class="intro _fnt--center col-12">
                    <h2 class="fs-2 fw-bold _fnt--center _color--tertiary-1">Integrations</h2>
                    <p class="fs-4 fw-normal _color--tertiary-1">Connect with popular tools and boost your productivity.</p>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-wordpress _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">wordpress</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-slack _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Slack</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-wordpress _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Shortcuts</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-google _color--tertiary-1"></i></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Google Tag Manager</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-facebook _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Facebook</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-solid fa-star-of-life _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Zapier</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-searchengin _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Bing</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-twitter _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Twitter</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-quora _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Quora</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-reddit _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Reddit</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-solid fa-chart-simple _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Google Analtytics</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-linkedin _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Linkedin</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-pinterest _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Pinterest</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-snapchat _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Snapchat</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-tiktok _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Tiktok</p></div>
                </div>
                <div class="brand col-2">
                    <div class="icon"><i class="fa-brands fa-adversal _color--tertiary-1"></i></div>
                    <div class="name"><p class="fs-4 fw-normal _color--tertiary-1">Addroll</p></div>
                </div>
                <div class="cta _fnt--center col-12">
                    <a href="" class="fs-4 fw-bold btn btn-primary rounded-pill _bkgrd--primary-1 _bkgrd--secondary-1-hvr _color--basic-white">Get Started</a>
                </div>
            </div>
        </div>
    </section>
    <section id="home-pricing" class="py-5">
        <div class="container">
            <div class="row gy-5 justify-content-center">
                <div class="intro col-12 text-center">
                    <h2 class="fs-2 fw-bold _fnt--center _color--tertiary-1">Pricing</h2>
                    <p class="fs-5 fw-normal _fnt--center _color--tertiary-1">Simple pricing plans for everyone and every budget.</p>
                    <div class="btn-group">
                        <button class="btn btn-outline-primary active">Monthly</button>
                        <button class="btn btn-outline-primary">Annually</button>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card rounded-4 shadow py-4" style="height:100%;">
                        <div class="card-body" style="flex:0;">
                            <span class="badge fs-6 rounded-pill text-bg-primary">Basic</span>
                            <div>
                                <span class="card-title fs-1 fw-bold _color--tertiary-1">$0</span>
                                <span class="fs-4 fw-bold text-muted">/month</span>
                            </div>
                            <span class="card-text fs-5 fw-normal text-muted">Free forever</span>
                        </div>
                        <div class="cta text-center bg-secondary-subtle border border-start-0 border-end-0 border-secondary py-3">
                            <button class="btn btn-primary rounded-pill fs-5 w-75">Get Started</button>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>25 new links/mo</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>1K tracked clicks/mo</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>30-day analytics retention</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>3 custom domains</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>1 user</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>10 AI credits/mo</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>API Access</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>Basic support</li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card rounded-4 shadow border-2 border-primary py-4 position-relative" style="height:100%;">
                        <div><span class="fs-5 text-uppercase fw-bold px-4 py-2 rounded-pill position-absolute top-0 start-50 translate-middle text-bg-primary mx-auto">Popular</span></div>
                        <div class="card-body" style="flex:0;">
                            <span class="badge fs-6 rounded-pill text-bg-primary">Professional</span>
                            <div>
                                <span class="card-title fs-1 fw-bold _color--tertiary-1">$9.99</span>
                                <span class="fs-4 fw-bold text-muted">/month</span>
                            </div>
                            <span class="card-text fs-5 fw-normal text-muted">Billed monthly</span>
                        </div>
                        <div class="cta text-center bg-secondary-subtle border border-start-0 border-end-0 border-secondary py-3">
                            <button class="btn btn-primary rounded-pill fs-5 w-75">Get Started</button>
                        </div>
                        <ul class="list-group list-group-flush border-0">
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill text-primary me-3"></i>1,000 new links/mo</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill text-primary me-3"></i>50K tracked clicks/mo</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill text-primary me-3"></i>1-year analytics retention</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill text-primary me-3"></i>10 custom domains</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill text-primary me-3"></i>5 users</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill text-primary me-3"></i>Unlimited AI credits</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill text-primary me-3"></i>Root domain redirect</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill text-primary me-3"></i>Advanced link features</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill text-primary me-3"></i>Elevated support</li>
                        </ul>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card rounded-4 shadow py-4" style="height:100%;">
                        <div class="card-body" style="flex:0;">
                            <span class="badge fs-6 rounded-pill text-bg-primary">Business</span>
                            <div>
                                <span class="card-title fs-1 fw-bold _color--tertiary-1">$99.99</span>
                                <span class="fs-4 fw-bold text-muted">/month</span>
                            </div>
                            <span class="card-text fs-5 fw-normal text-muted">Billed monthly</span>
                        </div>
                        <div class="cta text-center bg-secondary-subtle border border-start-0 border-end-0 border-secondary py-3">
                            <button class="btn btn-primary rounded-pill fs-5 w-75">Get Started</button>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>5,000 new links/mo</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>150K tracked clicks/mo</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>2-year analytics retention</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>40 custom domains</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>15 users</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>Real-time events stream</li>
                            <li class="list-group-item fs-5"><i class="bi bi-check-circle-fill me-3"></i>Priority support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('cta-banner.php'); ?>
</main>

<?php require("footer.php"); ?>
