<?php

$buscar = $app['controllers_factory'];

//BUSCAR
$buscar->get('/buscar', function() use ($app) {

	return $app['twig']->render('buscar.twig');

})
->bind('buscar');

return $buscar;
