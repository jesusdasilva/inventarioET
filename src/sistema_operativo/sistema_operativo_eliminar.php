<?php

/*
 *  SISTEMA OPERATIVOELIMINAR
 */

$sistemaOperativo->get('sistemaOperativo/eliminar/{id}', function($id) use($app){

    try {
       
        //ELIMINAR
        $registroEliminado = $app['db']->delete('sistemas_operativos', array('id' => $id));

        //VERIFICAR QUE SE ELIMINÓ
        if( $registroEliminado <= 0 ){

            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => $mensaje));

        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se eliminó con éxito el sistema Operativo'));

        }

        //REDIRECCIONAR AL LISTADO
        return $app->redirect($app['url_generator']->generate('sistemaOperativoListar',array('pagina'=>0)));

    //CAPTURAR ERROR
    } catch (Exception $e) {

        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));

        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig'); 
                
    }
    
})
->bind('sistemaOperativoEliminar');