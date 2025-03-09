<?php require('header.php'); ?>

<main>
    <?php get_hero([
        'id' => 'pricing-hero',
        'subtitle' => 'Pricing',
        'title' => 'Simple Pricing',
        'message' => 'Transparent pricing for everyone. Always know what you will pay.',
        'url' => '',
    ], true); ?>
     <!-- <section id="pricing-hero" class="hero hero-short two-col">
        <div class="_container">
            <div class="content">
                <div class="hero-content">
                    <p class="pill-heading">Pricing</p>
                    <h1>simple Pricing</h1>
                    <p>Transparent pricing for everyone. Always know what you will pay.</p>
                </div>
            </div>
            <div class="img">
                <img src="dist/img/img-5.png" alt="">
            </div>
        </div>
    </section>     -->
    <section id="" class="pricing-list">
        <div class="container">
            <div class="row">
                <div class="price col-4">
                    <h3>Starter</h3>
                    <h3>Free</h3>
                    <p>Everything you need to start</p>
                    <ul>
                        <li>5 URLs allowed</li>
                        <li>Clicks per month</li>
                        <li>15-day Data Retention</li>
                        <li>✓ Custom Aliases
                        <li>Geotargeting</li>
                        <li>Device Targeting</li>
                        <li>x Language Targeting</li>
                        <li>x Bio Profiles</li>
                        <li>x QR Codes</li>
                        <li>x Custom Splash</li>
                        <li>x CTA Overlay</li>
                        <li>x Event Tracking</li>
                        <li>x Team Members</li>
                        <li>X Branded Domains</li>
                        <li>x Channels</li>
                        <li>× Campaigns & Link Rotator</li>
                        <li>x Multiple Domains</li>
                        <li>x Custom Parameters</li>
                        <li>x Export Data</li>
                        <li>x Developer API</li>
                        <li>x URL Customization</li>
                        <li>X</li>
                        <li>Advertisement-Free</li>
                    </ul>
                </div>
                <div class="price col-4">
                    <h3>Business</h3>
                    <h3>$59.99/month</h3>
                    <p>Perfect for your business activites</p>
                    <ul>
                        <li>100 URLs allowed</li>
                        <li>Clicks per month</li>
                        <li>60-day Data Retention</li>
                        <li>Custom Aliases</li>
                        <li>Geotargeting</li>
                        <li>Device Targeting</li>
                        <li>x Language Targeting</li>
                        <li>2 Bio Profiles</li>
                        <li>5 QR Codes</li>
                        <li>10 Custom Splash</li>
                        <li>10 CTA Overlay</li>
                        <li>10 Event Tracking</li>
                        <li>5 Team Members</li>
                        <li>1 Branded Domains</li>
                        <li>Channels</li>
                        <li>Campaigns & Link Rotator</li>
                        <li>Multiple Domains</li>
                        <li>Custom Parameters</li>
                        <li>Export Data</li>
                        <li>Developer API</li>
                        <li>URL Customization</li>
                        <li>Advertisement-Free</li>
                    </ul>
                </div>
                <div class="price col-4">
                    <h3>Enterprise</h3>
                    <h3>$149.99/month</h3>
                    <p>Everything. Unlimited. Use as needed</p>
                    <ul>
                        <li>Unlimited URLs allowed</li>
                        <li>Unlimited Clicks per month</li>
                        <li>120-day Data Retention</li>
                        <li>Custom Aliases</li>
                        <li>Geotargeting
                        <li>Device Targeting</li>
                        <li>× Language Targeting</li>
                        <li>5 Bio Profiles</li>
                        <li>1 QR Codes</li>
                        <li>20 Custom Splash</li>
                        <li>20 CTA Overlay</li>
                        <li>20 Event Tracking</li>
                        <li>10 Team Members</li>
                        <li>5 Branded Domains</li>
                        <li>x Channels</li>
                        <li>Campaigns & Link Rotator</li>
                        <li>Multiple Domains</li>
                        <li>Custom Parameters</li>
                        <li>Export Data</li>
                        <li>Developer API</li>
                        <li>URL Customization</li>
                        <li>Advertisement-Free</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="pricing-faq">
        <div class="faqs container">
            <div class="row">
                <?php 
                    $faqs = [
                        ['Can I updgrage my account at any time?'],
                        ['How will I be charged?'],
                        ['What happens when I delete my account?'],
                        ['How do refunds work?', "Upon request we will issue a refund at the momment of the request"] 
                    ];
    
                    for ($i=0;$i< sizeof($faqs);$i++):
                ?>
                <div class="faq accordian-list col-4">
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
        </div>
    </section>
    
    <?php include('cta-banner.php'); ?>
</main>

<?php require('footer.php'); ?>