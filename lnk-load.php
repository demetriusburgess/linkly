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

	$router->get("home", function(){
        ob_start();
        require( ABSPATH . 'templates/app.php');
        $page = ob_get_clean();

		$res = (new Response())
            ->set_header("Content-Type", "text/html")
            ->set_status( 200 )
            ->set_body( $page );
            // ->set_body( "<html><head></head><body><p>Hi Kids</p></body></html>" );
		return $res;
        require( ABSPATH . 'templates/app.php');
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
    
    $router->run();

    // require( ABSPATH . 'templates/app.php');
}

?>