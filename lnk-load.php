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

    $router->get("admin", function(){
        ob_start();
        require( ABSPATH . 'templates/app.php');
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