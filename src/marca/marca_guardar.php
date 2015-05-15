<?php

/*
 *  MARCA GUARDAR NUEVO
 */

$marca->post('/marca/guardar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $marca = array('nombre'     => mb_strtoupper($app['request']->get('nombre'),'utf-8'),
                         'observacion'=> $app['request']->get('observacion'));
    
        //BUSCAR NOMBRE DE MARCA
        $buscarSql = " SELECT * FROM marcas WHERE nombre = ? ";
        $nombreEncontrado = $app['db']->fetchAssoc($buscarSql, array($marca['nombre']));
    
        //VERIFICAR QUE NO ESTE REPETIDA
        if($nombreEncontrado) throw new Exception('Error, el nombre de la Marca está repetido.'); 
        
        //GUARDAR MARCA
        $filasGuardadas = $app['db']->insert('marcas',$marca); 
									  
        //VERIFICAR QUE SE GUARDÓ
        if( $filasGuardadas <= 0 ) throw new Exception('Error al guardar la Marca .');
        
        //MENSAJE  
        $app['session']->getFlashBag()->add('success',array('message' => 'La Marca fue creada con éxito'));
		
        //REDIRECCIONAR A LISTAR
        return $app->redirect($app['url_generator']->generate('marcaListar',array('pagina'=>0)));
        
    //CAPTURAR LOS ERRORES    
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //REGRESAR A LA PLANTILLA DE DATOS
        return $app['twig']->render('marca/marca_datos.twig',array('marca' => $marca, 'editar'=> FALSE));
    }

})
->bind('marcaGuardar');