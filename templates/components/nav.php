<?php 

function nav(array $menuItems = [] ) {
    $items = array_map(function ($item) {
        return <<<HTML
            <li><a class="fs-6 fw-normal" href="{$item['url']}">{$item['text']}</a></li>
        HTML;
    }, $menuItems);

    $list = implode($items);

    return <<<HTML
        <nav id="main-nav" class="col-8">
            <ul>
                {$list}
                <!-- <li><a href="" class="btn btn-primary _bttn--pill fs-6">Get Sarted</a></li> -->
            </ul>
        </nav>
    HTML;
}