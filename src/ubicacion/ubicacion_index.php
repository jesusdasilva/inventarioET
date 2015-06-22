<?php

/*  
 *  UBICACION INDEX
 */

$ubicacion = $app['controllers_factory'];

$ubicacion->before(function() use ($app){
        
    if($app['session']->get('indicador') == null){

	    return $app->redirect($app['url_generator']->generate('login'));
    }
});

require_once __DIR__.'/ubicacion_actualizar.php';
require_once __DIR__.'/ubicacion_buscar.php';
require_once __DIR__.'/ubicacion_eliminar.php';
require_once __DIR__.'/ubicacion_guardar.php';
require_once __DIR__.'/ubicacion_listar.php';
require_once __DIR__.'/ubicacion_nuevo.php';

return $ubicacion;