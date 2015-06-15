<?php

/*
 *  SISTEMA OPERATIVO GUARDAR NUEVO
 */

$sistemaOperativo->post('/sistemaOperativo/guardar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $sistemaOperativo = array('nombre'     => mb_strtoupper($app['request']->get('nombre'),'utf-8'),
                                  'observacion'=> $app['request']->get('observacion'));
    
        //BUSCAR NOMBRE DE SISTEMA OPERATIVO
        $buscarSql = " SELECT * FROM vista_sistemas_operativos WHERE nombre = ? ";
        $nombreEncontrado = $app['db']->fetchAssoc($buscarSql, array($sistemaOperativo['nombre']));
    
        //VERIFICAR QUE NO ESTE REPETIDA
        if($nombreEncontrado) throw new Exception('Error, el nombre del Sistema Operativo está repetido.'); 
        
        //GUARDAR SISTEMA OPERATIVO
        $filasGuardadas = $app['db']->insert('sistemas_operativos',$sistemaOperativo); 
									  
        //VERIFICAR QUE SE GUARDÓ
        if( $filasGuardadas <= 0 ) throw new Exception('Error al guardar el Sistema operativo .');
        
        //MENSAJE  
        $app['session']->getFlashBag()->add('success',array('message' => 'El Sistema Operativo fue creado con éxito'));
		
        //REDIRECCIONAR A LISTAR
        return $app->redirect($app['url_generator']->generate('sistemaOperativoListar',array('pagina'=>0)));
        
    //CAPTURAR LOS ERRORES    
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //REGRESAR A LA PLANTILLA DE DATOS
        return $app['twig']->render('sistema_operativo/sistema_operativo_datos.twig',array('sistemaOperativo' => $sistemaOperativo, 'editar'=> FALSE));
    }

})
->bind('sistemaOperativoGuardar');