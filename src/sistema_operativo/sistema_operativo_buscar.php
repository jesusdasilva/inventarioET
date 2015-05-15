<?php

/*
 *  EMPRESA BUSCAR
 */

$sistemaOperativo->get('/sistema_operativo/buscar/{id}',function($id) use($app){

    try{

        //SQL
        $sql = 'SELECT * FROM sistemas_operativos WHERE id = ? ';	

        //BUSCAR ID
        $sistemaOperativo = $app['db']->fetchAssoc($sql, array($id));

        //MOSTRAR DATOS
        return $app['twig']->render('sistema_operativo/sistema_operativo_datos.twig',
                                    array('sistemaOperativo' => $sistemaOperativo ,'editar' =>TRUE));
    
    } catch (Exception $e) {
        
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');   
        
    }
    
})
->bind('sistemaOperativoBuscar');