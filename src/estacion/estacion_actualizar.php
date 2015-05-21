<?php

/*
 *  EMPRESA ACTUALIZAR
 */

$empresa->post('/empresa/actualizar', function() use ($app) {

    try{
        
        //TOMAR LOS DATOS DEL FORMULARIO
        $empresa = array('id'          => $app['request']->get('id'),
                         'nombre'      => $app['request']->get('nombre'),
                         'observacion' => $app['request']->get('observacion'));

        //ACTUALIZAR
        $filasActualizadas = $app['db']->update('empresas', 
                                                array('observacion'=> $empresa['observacion']), 
                                                array('id'=>$empresa['id']));
        
        //VERIFICAR QUE SE REALIZÓ LA ACTUALIZACIÓN
        if( $filasActualizadas <= 0 )
        {
            
            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => 'No se pudo actualizar la Empresa'));
        
            //REGRESAR AL FORMULARIO DATOS
            return $app['twig']->render('empresa/empresa_datos.twig',array('empresa' => $empresa,'editar' => TRUE));
            
        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se actualizó con éxito la Empresa'));
            
            //REDIRECCIONAR AL FORMULARIO LISTAR
            return $app->redirect($app['url_generator']->generate('empresaListar',array('pagina'=>0)));
            
        }
    
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
	
})
->bind('empresaActualizar');