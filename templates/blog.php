<?php require('header.php'); ?>

<main>
    <?php get_hero([
        'id' => 'blog-hero',
        'subtitle' => 'Blog Articles',
        'title' => 'RX.link Blog',
        'message' => 'We write aboute product, Productivity, and enterprise software',
        'url' => '',
    ], true); ?>
    <section id="featured-post-[id]" class="featured-post">
        <div class="_container">
            <div class="img">
                <img src="" alt="">
            </div>
            <div class="content">
                <h2>Start your own URL shortener business with rx.link</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquam at felis fringilla porttitor. Nullam gravida, ante a ultrices condimentum, purus dolor porttitor ex, ut placerat diam lorem et erat.
                </p>
            </div>
        </div>
    </section>
    <section class="posts">
        <div class="_container">
            <nav>
                <h2>Explore categories</h2>
                <ul>
                    <li>All</li>
                    <li>Company</li>
                    <li>Product</li>
                    <li>Productivity</li>
                    <li>Uncategorized</li>
                    <li>Use Cases</li>
                </ul>
                <form action="">
                    <input type="text">
                </form>
            </nav>
            <div class="post">
                <div>
                    <img src="dist/img-6.png" alt="">
                </div>
                <div>
                    <h3>New RX.link QR Code Index H1 2024</h3>
                    <p>
                        Suspendisse iaculis et ligula placerat ullamcorper. Quisque diam metus, posuere sed sollicitudin et, viverra a mi.
                    </p>
                    <div class="meta">
                        <p class="author"></p>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="post">
                <div>
                    <img src="dist/img-6.png" alt="">
                </div>
                <div>
                    <h3>More Great Features For Free? Yes, Please!</h3>
                    <p>
                        Suspendisse iaculis et ligula placerat ullamcorper. Quisque diam metus, posuere sed sollicitudin et, viverra a mi.
                    </p>
                </div>
            </div>
            <div class="post">
                <div>
                    <img src="dist/img-6.png" alt="">
                </div>
                <div>
                    <h3>The RX.link Connections Platform Gets a Makeover</h3>
                    <p>
                        Suspendisse iaculis et ligula placerat ullamcorper. Quisque diam metus, posuere sed sollicitudin et, viverra a mi.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <?php include('cta-banner'); ?>
</main>

<?php require('footer.php'); ?>