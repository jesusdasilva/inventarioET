<?php
/*
 EMPRESA GUARDAR NUEVO
 */
$empresa->post('/empresa/guardar', function() use ($app) {

    try{

        //DATOS DEL FORMULARIO
        $nombre = mb_strtoupper($app['request']->get('nombre'),'utf-8');//CAMBIAR A MAYÚSCULAS EL NOMBRE
        //VERIFICAR SI SE ENVIÓ EL CAMPO OBSERVACIÓ
        if($app['request']->get('observacion')){
            $observacion = $app['request']->get('observacion');
        }else{
            $observacion = null;
        }

        //VERIFICAR SI EL NOMBRE ESTA REPETIDO
        $Sql = " SELECT * FROM vista_empresas WHERE nombre = ? ";
        $nombreEncontrado = $app['db']->fetchAssoc($Sql, array($nombre));

        if(!$nombreEncontrado){//NO ESTA REPETIDO EL NOMBRE

            //INSERTAR
            $registrosAfectados = $app['db']->insert('empresas',array('nombre' =>$nombre,
                                                                      'observacion'=>$observacion));
            if($registrosAfectados <= 0)
                throw new Exception('Error, No se pudo crear la empresa.');

        }else{//NOMBRE DE EMPRESA REPETIDO

            //MENSAJE
            $mensaje = 'La empresa se encuentra repetida';
            $app['session']->getFlashBag()->add('danger',array('message' => $message));
            //REENVIAR A FORMULÁRIO DATOS
            return $app['twig']->render('empresa/empresa_datos.twig',array('nombre' => $nombre,
                                                                           'observacion' => $observacion,
                                                                           'editar'=> TRUE));
        }

        //MENSAJE
        $mensaje = 'La Empresa fue actualizada';
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
->bind('empresaGuardarNuevo');
