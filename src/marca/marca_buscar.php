<?php

/*
 *  MARCA BUSCAR
 */

$marca->get('/marca/buscar/{id}',function($id) use($app){

    try{

        //SQL
        $sql = 'SELECT * FROM vista_marcas WHERE id = ? ';	

        //BUSCAR ID
        $marca = $app['db']->fetchAssoc($sql, array($id));

        //MOSTRAR DATOS
        return $app['twig']->render('marca/marca_datos.twig',
                                    array('marca' => $marca ,'editar' =>TRUE));
    
    } catch (Exception $e) {
        
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');   
        
    }
    
})
->bind('marcaBuscar');