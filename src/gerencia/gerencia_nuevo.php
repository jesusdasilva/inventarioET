<?php

/*
 *  GERENCIA NUEVO
 */

$gerencia->get('/gerencia/nuevo', function() use ($app) {

    //VARIABLES
    $gerencia = array('id'=>'','nombre'=>'','observacion'=>'');
    
    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('gerencia/gerencia_datos.twig',array('gerencia'=>$gerencia,'editar' => FALSE));

})
->bind('gerenciaNuevo');