<?php

$inicio = $app['controllers_factory'];

//INICIO
$login->get('/inicio', function() use ($app) {

	return $app['twig']->render('inicio.twig');

})
->bind('inicio');

return $inicio;