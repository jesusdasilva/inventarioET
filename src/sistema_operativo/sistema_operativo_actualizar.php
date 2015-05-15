<?php

/*
 *  SISTEMA OPERATIVO ACTUALIZAR
 */

$sistemaOperativo->post('/sistemaOperativo/actualizar', function() use ($app) {

    try{
        
        //TOMAR LOS DATOS DEL FORMULARIO
        $sistemaOperativo = array('id'          => $app['request']->get('id'),
                                  'nombre'      => $app['request']->get('nombre'),
                                  'observacion' => $app['request']->get('observacion'));

        //ACTUALIZAR
        $filasActualizadas = $app['db']->update('sistemas_operativos', 
                                                array('observacion'=> $sistemaOperativo['observacion']), 
                                                array('id'         =>$sistemaOperativo['id']));
        
        //VERIFICAR QUE SE REALIZÓ LA ACTUALIZACIÓN
        if( $filasActualizadas <= 0 )
        {
            
            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => 'No se pudo actualizar el sistema Operativo'));
        
            //REGRESAR AL FORMULARIO DATOS
            return $app['twig']->render('sistema_operativo/sistema_operativo_datos.twig',
                                        array('sistemaOperativo' => $sistemaOperativo,'editar' => TRUE));
            
        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se actualizó con éxito el Sistema Operativo'));
            
            //REDIRECCIONAR AL FORMULARIO LISTAR
            return $app->redirect($app['url_generator']->generate('sistemaOperativoListar',array('pagina'=>0)));
            
        }
    
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
	
})
->bind('sistemaOperativoActualizar');