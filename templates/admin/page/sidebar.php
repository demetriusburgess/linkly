<?php 

/*
class Sidebar {
    public string $title;

    public string $links = [];
}*/

// function echo_sidebar(string $title = '', array $menu = [], array $branding = []) {
//     $test = '';

//     return <<<'HTML' 
//         <div id="test-sideabar" class="sidebar col bg-dark-subtle">
//             <div class="branding">
//                 <a href="">
//                     <!-- <img src="..." alt=""> -->
//                     <svg class="d-block m-auto" width="170" height="70" xmlns="http://www.w3.org/2000/svg">
//                     <text x="50%" y="50%" font-size="24" font-weight="bold" text-anchor="middle" fill="#333" dy=".3em">logo here</text>
//                     </svg>
//                 </a>
//             </div>
//             <div class="menu-wrapper">
//                 <ul class="menu accordian p-0" style="list-style: none;">
//                 <li class="menu-item">
//                     <p class="menu-label py-2 px-3 m-0 m-2 d-block text-decoration-none text-light muted">Test Go</p>
//                 </li>
//                 </ul>  
//             </div>
//         </div>
//     HTML;
// }

menu_item([
    'text' => 'Menu Item',
    'id'  => 'menu-item',
    'class' => 'menu-item',
    'sub_menu' => [
        [
            'text' => 'Menu Item',
            'id'  => 'menu-item',
            'class' => 'menu-item',
        ],
        [
            'text' => 'Menu Item',
            'id'  => 'menu-item',
            'class' => 'menu-item',
        ],
    ],
]);



function menu_item(array $menu_item = ['title'=>'Sample', 'url'=>'#']) {
    $menu = [];
    $sub_menu_html = '';
    
    if (isset($menu_item['sub_menu']) && is_array($menu_item["sub_menu"]) && sizeof($menu_item["sub_menu"]) > 0) {

        for ($i=0;$i<sizeof($menu_item["sub_menu"]);$i++) {
            $menu[] = <<<HTML
                <li class="sub-menu-item">
                    <a href="{$sub_menu[$i]['url']}">{$sub_menu[$i]['title']}</a>
                </li>
            HTML;
        }

        if (sizeof($menu) > 0) {
            $compressed = implode("", $menu);

            $sub_menu_html = <<<HTML
                <ul>{$compressed}</ul>;
            HTML;
        }
    }

    $id = preg_replace("/\s+/", "-", strtolower($menu_item["title"])) . "-collapse";
     
    return <<<HTML
        <li class="menu-item accordian-item pb-1">
                <div class="accordian-header rounded-2 py-2 px-3">
                    <button class="accordion-button text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id; ?>" aria-expanded="true" aria-controls="<?php echo $id; ?>">
                        <i class="<?php echo $icon; ?> me-2"></i>
                            {$menu_item['title']}
                        <i class="accordian-arrow bi bi-caret-right position-absolute end-0"></i>
                    </button>
                </div>
                <!-- <a class="bg-transparent rounded-2 d-block py-2 px-3 w-100 text-decoration-none" href="{$menu_item['url']}"><i class="bi bi-stickies me-2 "></i> </a> -->
                {$sub_menu_html}
        </li>
        <!-- <li class="menu-item accordion-item pb-1">
                <div class="accordian-header rounded-2 py-2 px-3">
                    <button class="accordion-button text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id; ?>" aria-expanded="true" aria-controls="<?php echo $id; ?>">
                        <i class="<?php echo $icon; ?> me-2"></i>
                        <?php echo $title; ?>
                        <i class="accordian-arrow bi bi-caret-right position-absolute end-0"></i>
                    </button>
                </div>
                <div id="<?php echo $id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="submenu p-0" style="list-style: none;">
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 1</a></li>
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 2</a></li>
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 3</a></li>
                        </ul>
                    </div>
                </div>
            </li> -->
    HTML;
}

function echo_sidebar(string $title = '', array $menu = [], array $branding = []) {
    $html_list = [];
    $html_list_str = "";
    $sub_temp = [];
    $sub_temp_str = "";

    for ($i=0;$i<sizeof($menu);$i++) {
        // if (isset($menu[$i]['title'])) {
        //     if (is_array($menu[$i]['submenu']) && sizeof($menu[$i]['submenu']) > 0) {
        //         $sub_menu = $menu[$i]['submenu'];

        //         for ($j=0;$j<sizeof($sub_menu);$j++) {
        //             $sub_temp[] = <<<HTML
        //                 <li class="sub-menu-item">
        //                     <a href="{$sub_menu['url']}">{$sub_menu['title']}</a>
        //                 </li>
        //             HTML;
        //         }
        //     }

        //     $sub_temp_str = implode("", $sub_temp);

        //     $html_list[] = <<<HTML
        //         <li class="menu-item accordian-item pb-1">
        //              <a class="bg-transparent rounded-2 d-block py-2 px-3 w-100 text-decoration-none" href="{$menu[$i]['url']}"><i class="bi bi-stickies me-2 "></i> {$menu[$i]['title']}</a>
        //              {$sub_temp_str}
        //         </li>
        //     HTML;
        // }
        $menu_item = menu_item($menu[$i], $menu[$i]['sub_menu'] ? $menu[$i]['sub_menu'] : []);

        $html_list[] = <<<HTML
            <ul>{$menu_item}</ul>
        HTML;
    };

    $html_list_str = implode("", $html_list);

    echo 2;

    echo <<<HTML
        <div id="{$title}-sideabar" class="sidebar col bg-dark-subtle">
            <div class="branding">
                <a href="">
                    <!-- <img src="..." alt=""> -->
                    <svg class="d-block m-auto" width="170" height="70" xmlns="http://www.w3.org/2000/svg">
                    <text x="50%" y="50%" font-size="24" font-weight="bold" text-anchor="middle" fill="#333" dy=".3em">logo here</text>
                    </svg>
                </a>
            </div>
            <div class="menu-wrapper">
                <ul class="menu accordian p-0" style="list-style: none;">
                    {$html_list_str}
                </ul>
            </div>
        </div>
    HTML;
} 

// function echo_sidebar(string $title = '', array $menu = [], array $branding = []) {
//     $html_list = [];
//     $html_list_str = "";
//     $sub_temp = [];
//     $sub_temp_str = "";

//     for ($i=0;$i<sizeof($menu);$i++) {
//         if (isset($menu[$i]['title'])) {
//             if (is_array($menu[$i]['submenu']) && sizeof($menu[$i]['submenu']) > 0) {
//                 $sub_menu = $menu[$i]['submenu'];

//                 for ($j=0;$j<sizeof($sub_menu);$j++) {
//                     $sub_temp[] = <<<HTML
//                         <li class="sub-menu-item">
//                             <a href="{$sub_menu['url']}">{$sub_menu['title']}</a>
//                         </li>
//                     HTML;
//                 }
//             }

//             $sub_temp_str = implode("", $sub_temp);

//             $html_list[] = <<<HTML
//                 <li class="menu-item accordian-item pb-1">
//                      <a class="bg-transparent rounded-2 d-block py-2 px-3 w-100 text-decoration-none" href="{$menu[$i]['url']}"><i class="bi bi-stickies me-2 "></i> {$menu[$i]['title']}</a>
//                      {$sub_temp_str}
//                 </li>
//             HTML;
//         }
//     };

//     $html_list_str = implode("", $html_list);

//     echo <<<HTML
//         <div id="main-sideabar" class="sidebar col bg-dark-subtle">
//             <div class="branding">
//                 <a href="">
//                     <!-- <img src="..." alt=""> -->
//                     <svg class="d-block m-auto" width="170" height="70" xmlns="http://www.w3.org/2000/svg">
//                     <text x="50%" y="50%" font-size="24" font-weight="bold" text-anchor="middle" fill="#333" dy=".3em">logo here</text>
//                     </svg>
//                 </a>
//             </div>
//             <div class="menu-wrapper">
//                 <ul class="menu accordian p-0" style="list-style: none;">
//                     {$html_list_str}
//                 </ul>
//             </div>
//         </div>
//     HTML;
// } 
?>
<style>
    .sidebar {
        /* height: 100vh; */
        background: linear-gradient(135deg, #6379c3 0%, #546ee5 60%);
    }

    .sidebar .accordian .accordian-header:hover {
        background-color: rgba(255,255,255,0.2);
    }

    .sidebar .submenu .submenu-item a:hover {
        background-color: rgba(255,255,255,0.2);
    }

    /* .sidebar .accordian-button.collapsed .accordian-arrow {
        transform: rotate(0deg) !important;
        transition: 0.2s;
    } */

    .sidebar .accordion-button .accordian-arrow {
        transform: rotate(0deg);
        transition: 0.2s;
    }

    .accordian-arrow {
        /* background: pink; */
    }
    
    .sidebar .accordion-button:not(.collapsed) .accordian-arrow {
        transform: rotate(90deg);
        opacity: 0.4;
    }
</style>

<?php echo_sidebar("main", [
    ["title"=>"Test", "url" => "#"],
    ["title"=>"Test", "url" => "#"],
    ["title"=>"Test", "url" => "#"],
    ["title"=>"Test", "url" => "#"],
    ["title"=>"Test", "url" => "#"],
    ["title"=>"Test", "url" => "#"],
]); ?>
<div id="main-sideabar" class="sidebar col bg-dark-subtle">
    <div class="branding">
        <a href="">
            <!-- <img src="..." alt=""> -->
            <svg class="d-block m-auto" width="170" height="70" xmlns="http://www.w3.org/2000/svg">
            <text x="50%" y="50%" font-size="24" font-weight="bold" text-anchor="middle" fill="#333" dy=".3em">logo here</text>
            </svg>
        </a>
    </div>
    <div class="menu-wrapper">
        <ul class="menu accordian p-0" style="list-style: none;">
            <li class="menu-item">
                <p class="menu-label py-2 px-3 m-0 m-2 d-block text-decoration-none text-light muted">CMS</p>
            </li>
            <?php 
                $links = [
                    ["title" => "Workspace Settings", "icon" => "bi bi-house", "url" =>"#"], 
                    ["title" => "General", "icon" => "bi bi-pin-angle", "url" =>"#"], 
                    ["title" => "Domains", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "Tags", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "Billing", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "People", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "Integrations", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "Security", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "Developer Settings", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "API Keys", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "OAuth Apps", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "Account Settings", "icon" => "bi bi-copy", "url" =>"#"],
                    ["title" => "Notifications", "icon" => "bi bi-copy", "url" =>"#"],
                ]; 

                
                for ($i=0;$i<sizeof($links);$i++):
                    $id = preg_replace("/\s+/", "-", strtolower($links[$i]["title"])) . "-collapse";
                    $title = $links[$i]['title'];
                    $icon = $links[$i]['icon'];
            ?>
            <li class="menu-item accordion-item pb-1">
                <div class="accordian-header rounded-2 py-2 px-3">
                    <button class="accordion-button text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id; ?>" aria-expanded="true" aria-controls="<?php echo $id; ?>">
                        <i class="<?php echo $icon; ?> me-2"></i>
                        <?php echo $title; ?>
                        <i class="accordian-arrow bi bi-caret-right position-absolute end-0"></i>
                    </button>
                </div>
                <div id="<?php echo $id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="submenu p-0" style="list-style: none;">
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 1</a></li>
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 2</a></li>
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 3</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <?php endfor; ?>
            <li class="menu-item">
                <p class="menu-label py-2 px-3 m-0 m-2 d-block text-decoration-none text-light muted">Apps</p>
            </li>
            <?php 
                $links = [
                    ["title" => "Calendar", "icon" => "bi bi-house", "url" =>"#"], 
                    ["title" => "Media", "icon" => "bi bi-pin-angle", "url" =>"#"], 
                    ["title" => "File Manager", "icon" => "bi bi-copy", "url" =>"#"]
                ]; 
                
                for ($i=0;$i<sizeof($links);$i++): 
                    $id = preg_replace("/\s+/", "-", strtolower($links[$i]["title"])) . "-collapse";
                    $title = $links[$i]['title'];
                    $icon = $links[$i]['icon'];
            ?>
            <li class="menu-item accordion-item pb-1">
                <div class="accordian-header rounded-2 py-2 px-3">
                    <button class="accordion-button text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id; ?>" aria-expanded="true" aria-controls="<?php echo $id; ?>">
                        <i class="<?php echo $icon; ?> me-2"></i>
                        <?php echo $title; ?>
                        <i class="accordian-arrow bi bi-caret-right position-absolute end-0"></i>
                    </button>
                </div>
                <div id="<?php echo $id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="submenu p-0" style="list-style: none;">
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 1</a></li>
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 2</a></li>
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 3</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <?php endfor; ?>
            <li class="menu-item">
                <p class="menu-label py-2 px-3 m-0 mt-2 d-block text-decoration-none text-light muted">Access</p>
            </li>
            <?php 
                $links = [
                    ["title" => "Users", "icon" => "bi bi-house", "url" =>"#"], 
                    ["title" => "Settings", "icon" => "bi bi-pin-angle", "url" =>"#"],
                ]; 
                
                for ($i=0;$i<sizeof($links);$i++): 
                    $id = preg_replace("/\s+/", "-", strtolower($links[$i]["title"])) . "-collapse";
                    $title = $links[$i]['title'];
                    $icon = $links[$i]['icon'];
            ?>
            <li class="menu-item accordion-item pb-1">
                <div class="accordian-header rounded-2 py-2 px-3">
                    <button class="accordion-button text-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $id; ?>" aria-expanded="true" aria-controls="<?php echo $id; ?>">
                        <i class="<?php echo $icon; ?> me-2"></i>
                        <?php echo $title; ?>
                        <i class="accordian-arrow bi bi-caret-right position-absolute end-0"></i>
                    </button>
                </div>
                <div id="<?php echo $id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="submenu p-0" style="list-style: none;">
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 1</a></li>
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 2</a></li>
                            <li class="submenu-item">
                                <a class="rounded-2 py-2 px-3 d-block text-decoration-none text-light" href=""><i class="bi bi-square me-2" style="visibility: hidden;"></i>Sub Menu Item 3</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <?php endfor; ?>
        </ul>
    </div>
</div>