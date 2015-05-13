<?php

$modificar = $app['controllers_factory'];

$modificar->get('/modificar/{id_estacion}',function($id_estacion) use($app){

    $sql = 'SELECT * FROM estaciones WHERE id_estacion = ? ';	

    $estacion = $app['db']->fetchAssoc($sql, array($id_estacion));

    return $app['twig']->render('datos.html',array('editar'=>true,
                                                   'estacion' => $estacion));
})
->bind('modificar');

return $modificar;
