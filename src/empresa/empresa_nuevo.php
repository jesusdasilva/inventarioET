<?php

/*
 *  EMPRESA NUEVO
 */

$empresa->get('/empresa/nuevo', function() use ($app) {

    $empresa = array('id' =>'','nombre'=> '','observacion'=>'');
    
    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('empresa/empresa_datos.twig', array ('empresa' => $empresa,'editar' => FALSE));

})
->bind('empresaNuevo');