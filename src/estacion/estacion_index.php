<?php

/*  
 *  ESTACION INDEX
 */

$estacion = $app['controllers_factory'];

$estacion->before(function() use ($app){
        
    if($app['session']->get('indicador') == null){

	    return $app->redirect($app['url_generator']->generate('login'));
    }
});

require_once __DIR__.'/estacion_actualizar.php';
require_once __DIR__.'/estacion_buscar.php';
require_once __DIR__.'/estacion_eliminar.php';
require_once __DIR__.'/estacion_guardar.php';
require_once __DIR__.'/estacion_listar.php';
require_once __DIR__.'/estacion_nuevo.php';
require_once __DIR__.'/estacion_crear_vlan.php';

return $estacion;