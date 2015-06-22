<?php

/*  
 *  EMPRESA INDEX
 */

$inicio = $app['controllers_factory'];

$inicio->before(function() use ($app){
        
    if($app['session']->get('indicador') == null){

	    return $app->redirect($app['url_generator']->generate('login'));
    }
});

require_once __DIR__.'/inicio.php';

return $inicio;