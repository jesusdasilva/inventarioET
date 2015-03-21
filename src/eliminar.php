<?php

$eliminar = $app['controllers_factory'];

$eliminar->get('/eliminar/{id_estacion}/{id_empresa}', function($id_estacion,$id_empresa) use($app){

	$rows = $app['db']->delete('estaciones', array('id_estacion' => $id_estacion, 'id_empresa' =>$id_empresa));

	if( $rows <= 0 ){

		//$app['session']->setFlash('error', 'Se ha producido un error al actualizar el elementos');
				
	}else{
	
		//$app['session']->setFlash('ok', 'Se ha actualizado correctamente');
	}

	return $app->redirect($app['url_generator']->generate('listado'));

})
->bind('eliminar');

return $eliminar;

