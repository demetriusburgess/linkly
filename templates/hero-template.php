<section id="<?php echo $args['id']?>" class="hero hero-tall">
    <div class="container">
<!-- <div class="_container _grid _grid--max-res-2 _grid--ultra-res-2 _grid--hi-res-2 _grid--xl-2 _grid--lg-2 _grid--md-2"> -->
        <div class="row justify-content-center">
            <div class="content col-6">
                <div class="hero-content text-center">
                    <p class="pill-heading fs-6 fw-bold text-uppercase _color--secondary-1 _bkgrd--secondary-102">{{$subtitle}}</p>
                    <h1 class="fs-1 fw-bold text-uppercase _color--tertiary-1">{{$title}}</h1>
                    <!-- <p class="_fnt--paragraph-1 _fnt--reg _color--tertiary-1"><?php echo $args['message']?></p> -->
                    <p class="fs-5 fw-normal _color--tertiary-1">{{$message}}</p>
                </div>
                {{linkform(false)}}
                <div class="mt-4">
                    {{linkcard(false)}}
                    
                    {{ for $i = 0; $i < 2; $i++ }}
                        {{linkcard(true)}}
                    {{ endfor }}
                </div>
            </div>
        </div>
    </div>
</section>
