<?php

/*
 *  EMPRESA GUARDAR NUEVO
 */

$empresa->post('/empresa/guardar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $empresa = array('nombre'     => mb_strtoupper($app['request']->get('nombre'),'utf-8'),
                         'observacion'=> $app['request']->get('observacion'));
    
        //BUSCAR NOMBRE DE EMPRESA
        $buscarSql = " SELECT * FROM empresas WHERE nombre = ? ";
        $nombreEncontrado = $app['db']->fetchAssoc($buscarSql, array($empresa['nombre']));
    
        //VERIFICAR QUE NO ESTE REPETIDA
        if($nombreEncontrado) throw new Exception('Error, el nombre de la Empresa está repetido.'); 
        
        //GUARDAR EMPRESA
        $filasGuardadas = $app['db']->insert('empresas',$empresa); 
									  
        //VERIFICAR QUE SE GUARDÓ
        if( $filasGuardadas <= 0 ) throw new Exception('Error al guardar la Empresa .');
        
        //MENSAJE  
        $app['session']->getFlashBag()->add('success',array('message' => 'La Empresa fue creada con éxito'));
		
        //REDIRECCIONAR A LISTAR
        return $app->redirect($app['url_generator']->generate('empresaListar',array('pagina'=>0)));
        
    //CAPTURAR LOS ERRORES    
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //REGRESAR A LA PLANTILLA DE DATOS
        return $app['twig']->render('empresa/empresa_datos.twig',array('empresa' => $empresa));
    }

})
->bind('empresaGuardar');