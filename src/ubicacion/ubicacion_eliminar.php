<?php

/*
 *  UBICACION ELIMINAR
 */

$ubicacion->get('ubicacion/eliminar/{id}', function($id) use($app){

    try {
       
        //ELIMINAR
        $registroEliminado = $app['db']->delete('ubicaciones', array('id' => $id));

        //VERIFICAR QUE SE ELIMINÓ
        if( $registroEliminado <= 0 ){

            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => $mensaje));

        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se eliminó con éxito la Ubicación'));

        }

        //REDIRECCIONAR AL LISTADO
        return $app->redirect($app['url_generator']->generate('ubicacionListar',array('pagina'=>0)));

    //CAPTURAR ERROR
    } catch (Exception $e) {

        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));

        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig'); 
                
    }
    
})
->bind('ubicacionEliminar');