<?php require('header.php'); ?>

<main>
    <?php 
        get_hero([
            'id' => 'bio-hero',
            'subtitle' => 'Bio Pages',
            'title' => 'Bio Pages',
            'message' => 'Easy to use, dynamic and customizable QR codes for your marketing campaigns. Analyze statistics and optimize your marketing strategy and increase engagement.',
            'url' => '',
        ], true); 
    ?>
    <section class="two-col">
        <div class="_container">
            <div class="">
                <img src="dist/img/img-1.png" alt="">
            </div>
            <div class="">
                <h3 class="pill-heading _fnt--pill-heading _fnt--bld _color--secondary-1">One link</h3>
                <h2 class="_fnt--heading-2 _fnt--blk _color--tertiary-1">One link to rule them all</h2>
                <p class="_fnt--paragraph-1 _fnt--reg _color--tertiary-1">Our product lets you target your users so you can better understand their behavior and provide them with a better overall experience through smart re-targeting. We provide you with many powerful tools to reach them better.</p>
            </div>
            <div class="">
                <img src="dist/img/img-2.png" alt="">
            </div>
            <div class="">
                <h3 class="pill-heading _fnt--pill-heading _fnt--bld _color--secondary-1">Trackable</h3>
                <h2 class="_fnt--heading-2 _fnt--blk _color--tertiary-1">Track and optimize</h2>
                <p class="_fnt--paragraph-1 _fnt--reg _color--tertiary-1">Profiles are fully trackable and you can find out exactly how many people have visited your profiles or clicked links on
your profile and where they are from.</p>
            </div>
        </div>
    </section>
    <!-- <section class="cta-banner">
        <div class="_container">
            <div class="_fnt--center">
                <h2>Marketing with confidence.</h2>
                <p>Start your marketing campaign now and reach your customers efficiently.</p>
                <a href="" class="_bttn--pill _bkgrd--primary-1 _color--basic-white">Get Started</a>
            </div>
        </div>
    </section> -->
    <?php include('cta-banner.php'); ?>
</main>

<?php require('footer.php'); ?>