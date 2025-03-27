{{include('header-template')}}
<main>
    <section id="<?php echo $args['id']?>" class="hero hero-tall">
        <div class="container">
    <!-- <div class="_container _grid _grid--max-res-2 _grid--ultra-res-2 _grid--hi-res-2 _grid--xl-2 _grid--lg-2 _grid--md-2"> -->
            <div class="row justify-content-center">
                <div class="content col-5">
                    <div class="hero-content text-center">
                        <p class="pill-heading fs-6 fw-bold text-uppercase _color--secondary-1 _bkgrd--secondary-102">Forgot Password</p>
                        <h1 class="fs-1 fw-bold text-uppercase _color--tertiary-1">Create New Password</h1>
                    </div>
                    {{include('form-reset-password')}}
                    <div class="text-center">
                        <p><a href="?api=login" class="link-dark link-underline-opacity-0 link-offset-0 link-offset-4-hover link-underline-opacity-100-hover">Already Have An Account? Sign In.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
{{include('footer-template')}}