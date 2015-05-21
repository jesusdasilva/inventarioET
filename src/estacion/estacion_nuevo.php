<?php

/*
 *  ESTACION NUEVO
 */

$estacion->get('/estacion/nuevo', function() use ($app) {

    $estacion = array('id' =>'','nombre'=> '','observacion'=>'');
    
    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('estacion/estacion_datos.twig', array ('estacion' => $estacion,'editar' => FALSE));

})
->bind('estacionNuevo');