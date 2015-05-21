<?php

/*
 *  MARCA ACTUALIZAR
 */

$marca->post('/marca/actualizar', function() use ($app) {

    try{
        
        //TOMAR LOS DATOS DEL FORMULARIO
        $marca = array('id'          => $app['request']->get('id'),
                       'nombre'      => $app['request']->get('nombre'),
                       'observacion' => $app['request']->get('observacion'));

        //ACTUALIZAR
        $filasActualizadas = $app['db']->update('marcas', 
                                                array('observacion'=> $marca['observacion']), 
                                                array('id'=>$marca['id']));
        
        //VERIFICAR QUE SE REALIZÓ LA ACTUALIZACIÓN
        if( $filasActualizadas <= 0 )
        {
            
            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => 'No se pudo actualizar la Marca'));
        
            //REGRESAR AL FORMULARIO DATOS
            return $app['twig']->render('marca/marca_datos.twig',array('marca' => $marca,'editar' => TRUE));
            
        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se actualizó con éxito la Marca'));
            
            //REDIRECCIONAR AL FORMULARIO LISTAR
            return $app->redirect($app['url_generator']->generate('marcaListar',array('pagina'=>0)));
            
        }
    
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
	
})
->bind('marcaActualizar');