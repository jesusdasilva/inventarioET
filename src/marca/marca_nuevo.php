<?php

/*
 *  MARCA NUEVO
 */

$marca->get('/marca/nuevo', function() use ($app) {

    $marca = array('id' =>'','nombre'=> '','observacion'=>'');
    
    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('marca/marca_datos.twig', array ('marca' => $marca,'editar' => FALSE));

})
->bind('marcaNuevo');