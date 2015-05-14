<?php

/*
 *  GERENCIA NUEVO
 */

$gerencia->get('/gerencia/nuevo', function() use ($app) {

    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('gerencia/gerencia_datos.twig');

})
->bind('gerenciaNuevo');