<?php

/*
 *  GERENCIA BUSCAR
 */

$gerencia->get('/gerencia/buscar/{id}',function($id) use($app){

    try{

        //SQL
        $sql = 'SELECT * FROM gerencias WHERE id = ? ';	

        //BUSCAR ID
        $gerencia = $app['db']->fetchAssoc($sql, array($id));

        //MOSTRAR DATOS
        return $app['twig']->render('gerencia/gerencia_datos.twig',array('gerencia' => $gerencia,'editar'=>TRUE));
    
    //CAPTURAR ERROR        
    } catch (Exception $e) {
        
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');   
        
    }
    
})
->bind('gerenciaBuscar');