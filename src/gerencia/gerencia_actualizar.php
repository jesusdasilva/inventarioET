<?php

/*
 *  GERENCIA ACTUALIZAR
 */

$gerencia->post('/gerencia/actualizar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $gerencia = array('id'         => $app['request']->get('id'),
                         'nombre'      => $app['request']->get('nombre'),
                         'observacion' => $app['request']->get('observacion'));

        //ACTUALIZAR
        $filasActualizadas = $app['db']->update('gerencias', 
                                                array('observacion'=> $gerencia['observacion']), 
                                                array('id'=>$gerencia['id']));
        
        //VERIFICAR QUE SE REALIZÓ LA ACTUALIZACIÓN
        if( $filasActualizadas <= 0 )
        {
            
            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => 'No se pudo actualizar la Gerencia'));
        
            //REGRESAR AL FORMULARIO DATOS
            return $app['twig']->render('gerencia/gerencia_datos.tiwg',array('gerencia' => $gerencia,'editar'=>TRUE));
            
        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se actualizó con éxito la Gerencia'));
            
            //REDIRECCIONAR A LISTAR
            return $app->redirect($app['url_generator']->generate('gerenciaListar',array('pagina'=>0)));
            
        }
    
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
	
})
->bind('gerenciaActualizar');