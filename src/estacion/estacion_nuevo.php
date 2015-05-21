<?php

/*
 *  ESTACION NUEVO
 */
require_once 'estaciones_registros.php';

$estacion->get('/estacion/nuevo', function() use ($app) {

    $estacion = inicializarEstacion();
    
    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('estacion/estacion_datos.twig', array ('estacion' => $estacion,'editar' => FALSE));

})
->bind('estacionNuevo');