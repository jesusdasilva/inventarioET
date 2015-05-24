<?php

/*
 *  ESTACION NUEVO
 */
require_once 'estaciones_registros.php';

$estacion->get('/estacion/nuevo', function() use ($app) {

    $estacion = inicializarEstacion();
    
    //BUSCAR EMPRESAS
    $sql = " SELECT id,nombre FROM empresas "; 
    $empresas = $app['db']->fetchAll($sql, array());
    
    //BUSCAR GERENCIAS
    $sql = " SELECT id,nombre FROM gerencias "; 
    $gerencias = $app['db']->fetchAll($sql, array());
    
    //BUSCAR UBICACIONES
    $sql = " SELECT id,nombre FROM ubicaciones "; 
    $ubicaciones = $app['db']->fetchAll($sql, array());
    
    
    //ABRIR FORMULARIO DE DATOS EN BLANCO
    return $app['twig']->render('estacion/estacion_datos.twig', 
                                array ('estacion'   =>$estacion,
                                       'empresas'   =>$empresas,
                                       'gerencias'  =>$gerencias,
                                       'ubicaciones'=>$ubicaciones,
                                       'editar' => FALSE));

})
->bind('estacionNuevo');