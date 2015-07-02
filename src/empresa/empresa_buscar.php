<?php

/*
 *  EMPRESA BUSCAR
 */

$empresa->get('/empresa/buscar/{id}',function($id) use($app){

    try{

        //SQL
        $sql = 'SELECT * FROM vista_empresas WHERE id = ? ';	

        //BUSCAR ID
        $registros = $app['db']->fetchAssoc($sql, array($id));

        //MOSTRAR DATOS
        return $app['twig']->render('empresa/empresa_datos.twig',
                                    array('id' => $registros['id'],
                                          'nombre' => $registros['nombre'],
                                          'observacion'=>$registros['observacion'],
                                          'editar' =>TRUE));
    
    } catch (Exception $e) {
        
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');   
        
    }
    
})
->bind('empresaBuscar');