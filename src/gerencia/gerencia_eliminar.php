<?php

/*
 *  GERENCIA ELIMINAR
 */

$gerencia->get('gerencia/eliminar/{id}', function($id) use($app){

    try {
       
        //ELIMINAR
        $registroEliminado = $app['db']->delete('gerencias', array('id' => $id));

        //VERIFICAR QUE SE ELIMINÓ
        if( $registroEliminado <= 0 ){

            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => 'No se pudo eliminar la Gerencia'));

        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se eliminó con éxito la Gerencia'));

        }

        //REDIRECCIONAR A LISTAR
        return $app->redirect($app['url_generator']->generate('gerenciaListar',array('pagina'=>0)));

    //CAPTURAR ERROR
    } catch (Exception $e) {

        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));

        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig'); 
                
    }
    
})
->bind('gerenciaEliminar');