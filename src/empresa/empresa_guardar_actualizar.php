<?php
/*
 EMPRESA GUARDAR 
 */
$empresa->post('/empresa/guardar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $id = $app['request']->get('id');
        $nombre = $app['request']->get('nombre');
        //VERIFICAR SI SE ENVIÓ EL CAMPO OBSERVACIÓ
        if($app['request']->get('observacion')){
            $observacion = $app['request']->get('observacion');
        }else{
            $observacion = null;
        }

        //ACTUALIZAR
        $registrosAfectados = $app['db']->update('empresas', 
                                                  array('observacion'=> $observacion), 
                                                  array('id'=>$id));
        if($registrosAfectados <= 0){
            
            //MENSAJE
            $message = 'No se pudo actulizar la empresa';
            $app['session']->getFlashBag()->add('danger',array('message' => $message));
            //REGRESAR AL FORMULARIO DATOS
            return $app['twig']->render('empresa/empresa_datos.twig',
                                         array('id' =>$id,
                                               'nombre'=>$nombre,
                                               'observacion'=>$observacion,
                                               'editar' => TRUE));
        }

        //MENSAJE
         $message = 'La empresa fue actualizada';
        $app['session']->getFlashBag()->add('success',array('message' => $mensaje));
        //REDIRECCIONAR AL FORMULARIO LISTAR
        return $app->redirect($app['url_generator']->generate('empresaListar',array('pagina'=>0)));
            
    
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
	
})
->bind('empresaGuardarActualizar');