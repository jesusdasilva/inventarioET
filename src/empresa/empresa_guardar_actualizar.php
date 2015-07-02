<?php
/*
 EMPRESA GUARDAR 
 */
$empresa->post('/empresa/guardar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        if($app['request']->get('id')){
            $id = $app['request']->get('id');
        }else{
            $id = null;
        }
        if($app['request']->get('nombre')){
            //COLOCAR EL NOMBRE EN MAYÚSCULA
            $nombre = mb_strtoupper($app['request']->get('nombre'),'utf-8');
        }else{
            $nombre = null;
        }
        if($app['request']->get('observacion')){
            $observacion = $app['request']->get('observacion');
        }else{
            $observacion = null;
        }

        if($id == null){ //NUEVA EMPRESA           

            //BUSCAR NOMBRE REPETIDO
            $Sql = " SELECT * FROM vista_empresas WHERE nombre = ? ";
            $nombreEncontrado = $app['db']->fetchAssoc($Sql, array($nombre));
            
            if(!$nombreEncontrado){//NO ESTA REPETIDO EL NOMBRE
                
                //INSERTAR NUEVO          
                $registrosAfectados = $app['db']->insert('empresas',array('nombre' =>$nombre,
                                                                          'observacion'=>$observacion);
                if($registrosAfectados > 0){
                    $mensaje = 'La Empresa fue actualizada';
                }else{
                    $mensaje = 'No se pudo crear la empresa';
                }

            }else{//NOMBRE DE EMPRESA REPETIDO
                
                $mensaje = 'La empresa se encuentra repetida';
                return $app['twig']->render('empresa/empresa_datos.twig',array('nombre' => $nombre,
                                                                               'observacion' => $observacion, 
                                                                               'editar'=> FALSE));
            }

        }else{//ACTUALIZAR EMPRESA

            //ACTUALIZAR
            $registrosAfectados = $app['db']->update('empresas', 
                                               array('observacion'=> $observacion), 
                                               array('id'=>$id));
            if($registrosAfectados > 0){
                $message = 'La empresa fue actualizada';
            }else{
                $message = 'No se pudo actulizar la empresa';
            }
        }
        
        //VERIFICAR QUE SE REALIZÓ LA ACTUALIZACIÓN
        if( $registrosAfectados <= 0 )
        {
            
            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => $message));

            //REGRESAR AL FORMULARIO DATOS
            return $app['twig']->render('empresa/empresa_datos.twig',
                                         array('id' =>$id,
                                               'nombre'=>$nombre,
                                               'observacion'=>$observacion,
                                               'editar' => TRUE));

        }else{

            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => $mensaje));

            //REDIRECCIONAR AL FORMULARIO LISTAR
            return $app->redirect($app['url_generator']->generate('empresaListar',array('pagina'=>0)));
            
        }
    
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));

        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
	
})
->bind('empresaGuardar');