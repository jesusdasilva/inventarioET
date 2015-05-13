<?php

$liberar = $app['controllers_factory'];

$liberar->get('/liberar/{id_estacion}', function($id_estacion) use($app){

	$rows = $app['db']->delete('estaciones', array('id_estacion' => $id_estacion));

	if( $rows <= 0 ){

		//$app['session']->setFlash('error', 'Se ha producido un error al actualizar el elementos');
				
	}else{
	
		//$app['session']->setFlash('ok', 'Se ha actualizado correctamente');
	}

	return $app->redirect($app['url_generator']->generate('listar'));

})
->bind('liberar');

return $liberar;

