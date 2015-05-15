<?php

/*
 *  EMPRESA BUSCAR
 */

$empresa->get('/empresa/buscar/{id}',function($id) use($app){

    try{

        //SQL
        $sql = 'SELECT * FROM empresas WHERE id = ? ';	

        //BUSCAR ID
        $empresa = $app['db']->fetchAssoc($sql, array($id));

        //MOSTRAR DATOS
        return $app['twig']->render('empresa/empresa_datos.twig',
                                    array('empresa' => $empresa ,'editar' =>TRUE));
    
    } catch (Exception $e) {
        
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');   
        
    }
    
})
->bind('empresaBuscar');