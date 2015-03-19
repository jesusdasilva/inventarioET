<?php

$editar = $app['controllers_factory'];

$editar->get('/editar/{id_estacion}/{id_empresa}', function($id_estacion,$id_empresa) use($app){
    
	$sql = 'SELECT * FROM estaciones WHERE id_estacion = ? and id_empresa = ?';	
	
	$estacion = $app['db']->fetchAssoc($sql, array($id_estacion, $id_empresa));
  
	return $app['twig']->render('datos.html', 
								 array('editar'   => true,
								       'estacion' => $estacion));
})
->bind('editar');

return $editar;
