<?php

$actualizar = $app['controllers_factory'];

//ACTUALIZAR DATOS ENVIADOS POR EL FORMULARIO
$actualizar->post('/actualizar', function() use ($app) {


	$estacion = array('id_estacion'    	=> $app['request']->get('id_estacion'),
					  'usuario'      	=> $app['request']->get('usuario'),
					  'nombre_estacion' => $app['request']->get('nombre_estacion'),
					  'direccion_ip' 	=> $app['request']->get('direccion_ip'),
					  'estatus' 		=> $app['request']->get('estatus'),
					  'observacion' 	=> $app['request']->get('observacion'),
					  'id_empresa' 		=> $app['request']->get('id_empresa'));

	$rows = $app['db']->update('estaciones', 
		                        array('usuario' 		=> $estacion['usuario'],
								      'nombre_estacion' => $estacion['nombre_estacion'],
		                        	  'direccion_ip' 	=> $estacion['direccion_ip'],
									  'estatus' 		=> $estacion['estatus'],
									  'observacion' 	=> $estacion['observacion']), 
								array('id_estacion' => $estacion['id_estacion'],
									  'id_empresa'  => $estacion['id_empresa']));

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
->bind('actualizar');

return $actualizar;