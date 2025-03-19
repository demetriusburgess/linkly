<?php
/**
 * Load application enviroment, then display app
 */

if (!isset($did_load)) {
    $did_load = true; 

    require('lnk-config.php'); 
    
    global $db;
    
    start();

    $req = new Request("api", $_REQUEST, $_SERVER, $_FILES );
    $router = new Router($req);
    
    $router->get("404", function(){
        $template = new TemplateEngine(ABSPATH .'templates');
        $page = 'load';

        $template->registerComponent('nav', 'nav');
        $template->registerComponent('linkform', 'linkform');
        $template->registerComponent('linkcard', 'linkcard');

        // $page = $template->render('app', ["title" => "Main Entry", 'name' => ['home'=>'rams', 'back'=>'two'] ]);
        $page = $template->render('app-template', [
        'id' => 'home-hero',
        'subtitle' => 'Easy link shortening',
        'title' => 'Short URL & QR code generator',
        'message' => 'A short link allows you to collect so much data about your customers and their behavior.',
        'url' => '',
        "menu" =>  [
            ["url" => "?api=login", "text" => "login"]
        ]]);
        
		$res = (new Response())
            ->set_header("Content-Type", "text/html")
            ->set_status( 200 )
            ->set_body( $page );
		return $res;
    });

    $router->get("", function(){
        ob_start();
        require( ABSPATH . 'templates/app.php');
        $page = ob_get_clean();
        
		$res = (new Response())
            ->set_header("Content-Type", "text/html")
            ->set_status( 200 )
            ->set_body( $page );
		return $res;
    });

    $router->get("login", function(){
        ob_start();
        // require( ABSPATH . 'templates/app.php');
        require( ABSPATH . 'templates/admin/page/dashboard.php');
        $page = ob_get_clean();
        
		$res = (new Response())
            ->set_header("Content-Type", "text/html")
            ->set_status( 200 )
            ->set_body( $page );
		return $res;
    });

    $router->post("", function(){
        ob_start();
        require( ABSPATH . 'templates/app.php');
        $page = ob_get_clean();
        
		$res = (new Response())
            ->set_header("Content-Type", "text/html")
            ->set_status( 400 )
            ->set_body( $page );
		return $res;
    });

    $router->post("admin", function(){
        // ob_start();
        // require( ABSPATH . 'templates/app.php');
        // $page = ob_get_clean();
        $page = json_encode([
            "data" => ['status'=>200]
        ]);
        
		$res = (new Response())
            ->set_header("Content-Type", "application/json")
            // ->set_header("Content-Type", "text/html")
            ->set_status( 200 )
            ->set_body( $page );
		return $res;
    });
    
    $router->run();

    // require( ABSPATH . 'templates/app.php');
}

?>