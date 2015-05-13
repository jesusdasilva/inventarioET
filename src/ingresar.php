<?php

$ingresar = $app['controllers_factory'];

// CREAR UN NUEVO REGISTRO
$ingresar->get('/ingresar', function() use ($app) {

    $estacion = array('id_empresa' => 'PETROMONAGAS');

    return $app['twig']->render('datos.twig',array('estacion' => $estacion));

})
->bind('ingresar');

// GUARDAR UN NUEVO REGISTRO
$ingresar->post('/ingresar', function() use ($app) {

    $estacion = array('id_estacion'     => $app['request']->get('id_estacion'),
 		      'usuario'      	=> $app['request']->get('usuario'),
		      'nombre_estacion' => $app['request']->get('nombre_estacion'),
		      'direccion_ip' 	=> $app['request']->get('direccion_ip'),
		      'estatus' 	=> $app['request']->get('estatus'),
		      'observacion' 	=> $app['request']->get('observacion'),
		      'id_empresa' 	=> $app['request']->get('id_empresa'));

    $rows = $app['db']->insert('estaciones',$estacion); 
									  
    if( $rows <= 0 ){
	//$app['session']->setFlash('error', 'Se ha producido un error al actualizar el elementos');
			
	return $app['twig']->render('datos.twig', 
			             array('editar' => true,
			                   'estacion' => $estacion));
    }else{
	//$app['session']->setFlash('ok', 'Se ha actualizado correctamente');
		
	return $app->redirect($app['url_generator']->generate('listado'));
    }

})
->bind('ingresar_post');

return $ingresar;

