<?php

$nuevo = $app['controllers_factory'];

// CREAR UN NUEVO REGISTRO
$nuevo->get('/nuevo', function() use ($app) {

	$estacion = array('id_empresa' => __EMPRESA__);

	return $app['twig']->render('datos.html',array('estacion' => $estacion));

})
->bind('nuevo');

// GUARDAR UN NUEVO REGISTRO
$nuevo->post('/nuevo', function() use ($app) {

	$estacion = array('id_estacion'    	=> $app['request']->get('id_estacion'),
					  'usuario'      	=> $app['request']->get('usuario'),
					  'nombre_estacion' => $app['request']->get('nombre_estacion'),
					  'direccion_ip' 	=> $app['request']->get('direccion_ip'),
					  'estatus' 		=> $app['request']->get('estatus'),
					  'observacion' 	=> $app['request']->get('observacion'),
					  'id_empresa' 		=> $app['request']->get('id_empresa'));

	$rows = $app['db']->insert('estaciones',$estacion); 
									  

	if( $rows <= 0 )
	{
		//$app['session']->setFlash('error', 'Se ha producido un error al actualizar el elementos');
			
		
		return $app['twig']->render('datos.html', 
			                         array('editar'   => true,
			                         	   'estacion' => $estacion));
	}else{
		
		//$app['session']->setFlash('ok', 'Se ha actualizado correctamente');
		
		return $app->redirect($app['url_generator']->generate('listado'));
	}

})
->bind('nuevo_post');

return $nuevo;