<?php

/*
 *  UBICACION GUARDAR NUEVO
 */

$ubicacion->post('/ubicacion/guardar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $ubicacion = array('nombre'     => mb_strtoupper($app['request']->get('nombre'),'utf-8'),
                           'observacion'=> $app['request']->get('observacion'));
    
        //BUSCAR NOMBRE DE UBICACION
        $buscarSql = " SELECT * FROM ubicaciones WHERE nombre = ? ";
        $nombreEncontrado = $app['db']->fetchAssoc($buscarSql, array($ubicacion['nombre']));
    
        //VERIFICAR QUE NO ESTE REPETIDA
        if($nombreEncontrado) throw new Exception('Error, el nombre de la Ubicación está repetido.'); 
        
        //GUARDAR UBICACION
        $filasGuardadas = $app['db']->insert('ubicaciones',$ubicacion); 
									  
        //VERIFICAR QUE SE GUARDÓ
        if( $filasGuardadas <= 0 ) throw new Exception('Error al guardar la Ubicación .');
        
        //MENSAJE  
        $app['session']->getFlashBag()->add('success',array('message' => 'La Ubicación fue creada con éxito'));
		
        //REDIRECCIONAR A LISTAR
        return $app->redirect($app['url_generator']->generate('ubicacionListar',array('pagina'=>0)));
        
    //CAPTURAR LOS ERRORES    
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //REGRESAR A LA PLANTILLA DE DATOS
        return $app['twig']->render('ubicacion/ubicacion_datos.twig',array('ubicacion' => $ubicacion, 'editar'=> FALSE));
    }

})
->bind('ubicacionGuardar');