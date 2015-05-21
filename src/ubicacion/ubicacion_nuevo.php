<?php

/*
 *  UBICACION NUEVO
 */

$ubicacion->get('/ubicacion/nuevo', function() use ($app) {

    //VARIABLES EN BLANCO
    $ubicacion = array('id' =>'','nombre'=> '','observacion'=>'');
    
    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('ubicacion/ubicacion_datos.twig', array ('ubicacion' => $ubicacion,'editar' => FALSE));

})
->bind('ubicacionNuevo');