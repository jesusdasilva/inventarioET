<?php

/*
 *  UBICACION ACTUALIZAR
 */

$ubicacion->post('/ubicacion/actualizar', function() use ($app) {

    try{
        
        //TOMAR LOS DATOS DEL FORMULARIO
        $ubicacion = array('id'          => $app['request']->get('id'),
                           'nombre'      => $app['request']->get('nombre'),
                           'observacion' => $app['request']->get('observacion'));

        //ACTUALIZAR
        $filasActualizadas = $app['db']->update('ubicaciones', 
                                                array('observacion'=> $ubicacion['observacion']), 
                                                array('id'=>$ubicacion['id']));
        
        //VERIFICAR QUE SE REALIZÓ LA ACTUALIZACIÓN
        if( $filasActualizadas <= 0 )
        {
            
            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => 'No se pudo actualizar la Ubicación'));
        
            //REGRESAR AL FORMULARIO DATOS
            return $app['twig']->render('ubicacion/ubicacion_datos.twig',array('ubicacion' => $ubicacion,'editar' => TRUE));
            
        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se actualizó con éxito la Ubicación'));
            
            //REDIRECCIONAR AL FORMULARIO LISTAR
            return $app->redirect($app['url_generator']->generate('ubicacionListar',array('pagina'=>0)));
            
        }
    
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
	
})
->bind('ubicacionActualizar');