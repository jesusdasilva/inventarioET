<?php

/*
 *  ESTACIÓN GUARDAR NUEVO
 */

$estacion->post('/estacion/guardar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $estacion = array('nombre'     => mb_strtoupper($app['request']->get('nombre'),'utf-8'),
                         'observacion'=> $app['request']->get('observacion'));
    
        //BUSCAR NOMBRE DE ESTACIÓN
        $buscarSql = " SELECT * FROM estaciones WHERE nombre = ? ";
        $nombreEncontrado = $app['db']->fetchAssoc($buscarSql, array($estacion['nombre']));
    
        //VERIFICAR QUE NO ESTE REPETIDA
        if($nombreEncontrado) throw new Exception('Error, el nombre de la Empresa está repetido.'); 
        
        //GUARDAR ESTACIÓN
        $filasGuardadas = $app['db']->insert('estaciones',$estacion); 
									  
        //VERIFICAR QUE SE GUARDÓ
        if( $filasGuardadas <= 0 ) throw new Exception('Error al guardar la Empresa .');
        
        //MENSAJE  
        $app['session']->getFlashBag()->add('success',array('message' => 'La Empresa fue creada con éxito'));
		
        //REDIRECCIONAR A LISTAR
        return $app->redirect($app['url_generator']->generate('estacionListar',array('pagina'=>0)));
        
    //CAPTURAR LOS ERRORES    
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //REGRESAR A LA PLANTILLA DE DATOS
        return $app['twig']->render('estacion/estacion_datos.twig',array('estacion' => $estacion, 'editar'=> FALSE));
    }

})
->bind('estacionGuardar');