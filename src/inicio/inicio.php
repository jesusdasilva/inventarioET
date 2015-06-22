<?php

/*
 *  INICIO
 */

$inicio->get('/inicio', function() use ($app) {

        
    return $app['twig']->render('inicio/inicio.twig');

})
->bind('inicio');