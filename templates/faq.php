<?php require('header.php'); ?>

<main>
    <?php get_hero([
        'id' => 'faq-hero',
        'subtitle' => 'FAQs',
        'title' => 'Frequently Asked Questions',
        'message' => 'Easy to use, dynamic and customizable QR codes for your marketing campaigns. Analyze statistics and optimize your marketing strategy and increase engagement.',
        'url' => '',
    ], true); ?>
    <section id="" class="pricing-list">
        <div class="_container _grid _grid--max-res-2 _grid--ultra-res-2 _grid--hi-res-2 _grid--xl-2">
            <div class="">
                <h2 class="fs-4 fw-bold">FAQS RX.link</h2>
                <ul>
                    <li class="fs-5 fw-normal"><button>Affiliate</button></li>
                    <li class="fs-5 fw-normal"><button>Pixel</button></li>
                    <li class="fs-5 fw-normal"><button>Subscription</button></li>
                </ul>
            </div>
            <div>
                <h2 class="fs-5 fw-normal">Pixels</h2>
                <h3 class="fs-5 fw-normal">Pixels are great! Learn how to use them here.</h3>
            </div>
            <div>
                <?php 
                    $faqs = [
                        ['Google Tag Manager Pixel','Google Tag Manager allows you to combine hundreds of pixels into a single pixel. Please make sure to add the correct "Container ID" otherwise events will not be tracked! e.g. GTM-ABC123DE'],
                        ['Facebook Pixel'],
                        ['Google Adwords Conversion Pixel'],
                        ['Linkedin Insight Pixel'],
                        ['Twitter Pixel'],
                        ['AdRoll Pixel'],
                        ['Quora Pixel Pixel']
                    ];

                    for ($i=0;$i< sizeof($faqs);$i++):
                ?>
                <div class="faq accordian-list">
                    <div class="accrd-set">
                        <div class="accrd-heading question">
                            <h4 class="fs-4 fw-bold"><?php echo $faqs[$i][0];?></h4>
                        </div>
                        <div class="accrd-body answer">
                            <p class="fs-5 fw-normal"><?php echo $faqs[$i][1];?></p>
                        </div>
                        <div class="accrd-toggle"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                </div>  
                <?php endfor; ?>                
            </div>
            <div>
                <h2 class="fs-4 fw-bold">Subscriptions</h2>
                <h3 class="fs-5 fw-normal">Everything you need to know about your subscriptions</h3>
            </div>
            <div>
                <?php 
                    $faqs = [
                        ['Can I upgrade my account at any time?'],
                        ['How will I be charged?'],
                        ['What happens when I delete my account?'],
                        ['How do refunds work?']
                    ];

                    for ($i=0;$i< sizeof($faqs);$i++):
                ?>
                <div class="faq accordian-list">
                    <div class="accrd-set">
                        <div class="accrd-heading question">
                            <h4 class="fs-5 fw-bold"><?php echo $faqs[$i][0];?></h4>
                        </div>
                        <div class="accrd-body answer">
                            <p class="fs-5 fw-normal"><?php echo $faqs[$i][1];?></p>
                        </div>
                        <div class="accrd-toggle"><i class="fa-solid fa-chevron-down"></i></div>
                    </div>
                </div>  
                <?php endfor; ?>
            </div>
        </div>
    </section>
    <?php include('cta-banner.php'); ?>
</main>

<?php require('footer.php'); ?>