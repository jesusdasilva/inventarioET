<?php

/*
 *  ESTACION BUSCAR
 */

//FORMULARIO BUSCAR
$estacion->get('/estacion/buscar',function() use($app){

    //BUSCAR EMPRESAS
    $sql = " SELECT id,nombre FROM empresas "; 
    $empresas = $app['db']->fetchAll($sql, array());

    //BUSCAR GERENCIAS
    $sql = " SELECT id,nombre FROM gerencias "; 
    $gerencias = $app['db']->fetchAll($sql, array());

    //BUSCAR UBICACIONES
    $sql = " SELECT id,nombre FROM ubicaciones "; 
    $ubicaciones = $app['db']->fetchAll($sql, array());

    //BUSCAR MARCAS
    $sql = " SELECT id,nombre FROM marcas "; 
    $marcas = $app['db']->fetchAll($sql, array());

    //BUSCAR SISTEMA OPERATIVO
    $sql = " SELECT id,nombre FROM sistemas_operativos "; 
    $sistemas_operativos = $app['db']->fetchAll($sql, array());
        
    //FORMULARIO BUSCAR
    return $app['twig']->render('estacion/estacion_buscar.twig',array('empresas' => $empresas,
                                                                      'gerencias'          =>$gerencias,
                                                                      'ubicaciones'        =>$ubicaciones,
                                                                      'marcas'             =>$marcas,
                                                                      'sistemas_operativos'=>$sistemas_operativos));

})
->bind('estacionBuscar');

//BUSCAR ID
$estacion->get('/estacion/buscar/{id}',function($id) use($app){

    try{

        //BUSCAR EMPRESAS
        $sql = " SELECT id,nombre FROM empresas "; 
        $empresas = $app['db']->fetchAll($sql, array());

        //BUSCAR GERENCIAS
        $sql = " SELECT id,nombre FROM gerencias "; 
        $gerencias = $app['db']->fetchAll($sql, array());

        //BUSCAR UBICACIONES
        $sql = " SELECT id,nombre FROM ubicaciones "; 
        $ubicaciones = $app['db']->fetchAll($sql, array());

        //BUSCAR MARCAS
        $sql = " SELECT id,nombre FROM marcas "; 
        $marcas = $app['db']->fetchAll($sql, array());

        //BUSCAR SISTEMA OPERATIVO
        $sql = " SELECT id,nombre FROM sistemas_operativos "; 
        $sistemas_operativos = $app['db']->fetchAll($sql, array());

        //SQL
        $sql = 'SELECT * FROM estaciones WHERE id = ? ';        

        //BUSCAR ID
        $estacion = $app['db']->fetchAssoc($sql, array($id));
        
        //ABRIR FORMULARIO DE DATOS
        return $app['twig']->render('estacion/estacion_datos.twig', 
                                    array ('estacion'           =>$estacion,
                                           'empresas'           =>$empresas,
                                           'gerencias'          =>$gerencias,
                                           'ubicaciones'        =>$ubicaciones,
                                           'marcas'             =>$marcas,
                                           'sistemas_operativos'=>$sistemas_operativos,
                                           'editar' => TRUE));
    
    } catch (Exception $e) {
        
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');   
        
    }
    
})
->bind('estacionBuscarID');