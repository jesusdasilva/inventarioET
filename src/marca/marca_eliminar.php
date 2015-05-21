<?php

/*
 *  MARCA ELIMINAR
 */

$marca->get('marca/eliminar/{id}', function($id) use($app){

    try {
       
        //ELIMINAR
        $registroEliminado = $app['db']->delete('marcas', array('id' => $id));

        //VERIFICAR QUE SE ELIMINÓ
        if( $registroEliminado <= 0 ){

            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => $mensaje));

        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se eliminó con éxito la Marca'));

        }

        //REDIRECCIONAR AL LISTADO
        return $app->redirect($app['url_generator']->generate('marcaListar',array('pagina'=>0)));

    //CAPTURAR ERROR
    } catch (Exception $e) {

        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));

        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig'); 
                
    }
    
})
->bind('marcaEliminar');