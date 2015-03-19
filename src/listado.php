<?php
$listado = $app['controllers_factory'];

$listado->get('/listado', function() use($app){
    
    $sql = 'SELECT count(id_estacion) as item,id_estacion,usuario,nombre_estacion,direccion_ip,estatus,Observacion,id_empresa'
           .' FROM estaciones';	
  	
  	$estaciones = $app['db']->fetchAll($sql, array());

  	return $app['twig']->render('listado.html', array('estaciones' => $estaciones));
})
->bind('listado');

return $listado;