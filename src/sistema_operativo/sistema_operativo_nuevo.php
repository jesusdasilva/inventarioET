<?php

/*
 *  SISTEMA OPERATIVO NUEVO
 */

$sistemaOperativo->get('/sistemaOperativo/nuevo', function() use ($app) {

    $sistemaOperativo = array('id' =>'','nombre'=> '','observacion'=>'');
    
    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('sistema_operativo/sistema_operativo_datos.twig', array ('sistemaOperativo' => $sistemaOperativo,'editar' => FALSE));

})
->bind('sistemaOperativoNuevo');