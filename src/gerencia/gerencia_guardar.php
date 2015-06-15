<?php

/*
 *  GERENCIA GUARDAR NUEVO
 */

$gerencia->post('/gerencia/guardar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $gerencia = array('nombre'     => mb_strtoupper($app['request']->get('nombre'),'utf-8'),
                          'observacion'=> $app['request']->get('observacion'));
    
        //BUSCAR NOMBRE
        $buscarSql = " SELECT * FROM vista_gerencias WHERE nombre = ? ";
        $nombreEncontrado = $app['db']->fetchAssoc($buscarSql, array($gerencia['nombre']));
    
        //VERIFICAR QUE NO ESTE REPETIDO
        if($nombreEncontrado) throw new Exception('Error, el nombre de la Gerencia está repetido.'); 
        
        //GUARDAR
        $filasGuardadas = $app['db']->insert('gerencias',$gerencia); 
									  
        //VERIFICAR QUE SE GUARDÓ
        if( $filasGuardadas <= 0 ) throw new Exception('Error al guardar la Gerencia.');
     
        //MENSAJE
        $app['session']->getFlashBag()->add('success',array('message' => 'La Gerencia fue creada con éxito'));
		
        //REDIRECCIONAR A LISTAR
        return $app->redirect($app['url_generator']->generate('gerenciaListar',array('pagina'=>0)));
        
    //CAPTURAR ERROR    
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR DATOS
        return $app['twig']->render('gerencia/gerencia_datos.twig',array('gerencia' => $gerencia,'editar' => FALSE));
    }

})
->bind('gerenciaGuardar');