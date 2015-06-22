<?php

/*  
 *  MARCA INDEX
 */

$marca = $app['controllers_factory'];

$marca->before(function() use ($app){
        
    if($app['session']->get('indicador') == null){

	    return $app->redirect($app['url_generator']->generate('login'));
    }
});

require_once __DIR__.'/marca_actualizar.php';
require_once __DIR__.'/marca_buscar.php';
require_once __DIR__.'/marca_eliminar.php';
require_once __DIR__.'/marca_guardar.php';
require_once __DIR__.'/marca_listar.php';
require_once __DIR__.'/marca_nuevo.php';

return $marca;