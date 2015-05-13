<?php

/*
 *  EMPRESA NUEVO
 */

$empresa->get('/empresa/nuevo', function() use ($app) {

    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('empresa/empresa_datos.twig');

})
->bind('empresaNuevo');