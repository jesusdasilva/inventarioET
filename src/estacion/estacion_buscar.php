<?php

/*
 *  ESTACION BUSCAR
 */

$estacion->get('/estacion/buscar/{id}',function($id) use($app){

    try{

        //SQL
        $sql = 'SELECT * FROM estaciones WHERE id = ? ';	

        //BUSCAR ID
        $estacion = $app['db']->fetchAssoc($sql, array($id));

        //MOSTRAR DATOS
        return $app['twig']->render('estacion/estacion_datos.twig',
                                    array('estacion' => $estacion ,'editar' =>TRUE));
    
    } catch (Exception $e) {
        
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');   
        
    }
    
})
->bind('estacionBuscar');