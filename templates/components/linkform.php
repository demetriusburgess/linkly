
<?php 

function linkform() {
    return <<<HTML
        <form method="post" class="bar-form" action="shorten.php">
            <input type="text" name="long-url" id="" class="fs-5 _color--tertiary-1" placeholder="https://stubbylink.com/register">
            <input type="hidden" name="urlmeta" value="">
            <button class="btn btn-primary rounded-pill fs-5 fw-bold text-uppercase _color--basic-white">Shorten</button>      
        </form>
    HTML;
}