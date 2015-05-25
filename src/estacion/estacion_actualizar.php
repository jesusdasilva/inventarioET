<?php

/*
 *  ESTACIÓN ACTUALIZAR
 */

$estacion->post('/estacion/actualizar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $estacion = array('id'     =>$app['request']->get('id'),
                          'estatus'=>$app['request']->get('estatus'),
            //USUARIO
            'usuario_nombre'      =>$app['request']->get('usuario_nombre'),
            'usuario_indicador'   =>$app['request']->get('usuario_indicador'),
            'usuario_id_empresa'  =>$app['request']->get('usuario_id_empresa'),
            'usuario_id_gerencia' =>$app['request']->get('usuario_id_gerencia'),
            'usuario_id_ubicacion'=>$app['request']->get('usuario_id_ubicacion'),
            //EQUIPO
            'equipo_id_marca'      =>$app['request']->get('equipo_id_marca'),
            'equipo_serial'        =>$app['request']->get('equipo_serial'),
            'equipo_etiqueta_pdvsa'=>$app['request']->get('equipo_etiqueta_pdvsa'),
            //ALMACENAMIENTO
            'almacenamiento_ram'        =>$app['request']->get('almacenamiento_ram'),
            'almacenamiento_dd'         =>$app['request']->get('almacenamiento_dd'),
            'almacenamiento_dd_cantidad'=>$app['request']->get('almacenamiento_dd_cantidad'),
            //PROCESADOR        
            'procesador_marca_modelo'=>$app['request']->get('procesador_marca_model'),
            'procesador_velocidad'   =>$app['request']->get('procesador_velocidad'),
            'procesador_cantidad'    =>$app['request']->get('procesador_cantidad'),
            //MONITOR
            'monitor_marca_modelo'=>$app['request']->get('monitor_marca_modelo'),
            'monitor_tamaño'      =>$app['request']->get('monitor_tamaño'),
            'monitor_cantidad'    =>$app['request']->get('monitor_cantidad'),
            //VIDEO
            'video_integrada'   =>$app['request']->get('video_integrada'),
            'video_memoria'     =>$app['request']->get('video_memoria'),
            'video_marca_modelo'=>$app['request']->get('video_marca_modelo'),
            'video_cantidad'    =>$app['request']->get('video_cantidad'),
            //RED
            'red_ip'      =>$app['request']->get('red_ip'),
            'red_hostname'=>$app['request']->get('red_hostname'),
            'red_gateway' =>$app['request']->get('red_gateway'),
            'red_mascara' =>$app['request']->get('red_mascara'),
            'red_mac'     =>$app['request']->get('red_mac'),
            //ENERGÍA
            'energia_dispositivo' =>$app['request']->get('energia_dispositivo'),
            'energia_estado'      =>$app['request']->get('energia_estado'),
            'energia_marca_modelo'=>$app['request']->get('energia_marca_modelo'),
            //SOFTWARE
            'software_id_sistema_operativo'=>$app['request']->get('software_id_sistema_operativo'),
            'software_aplicaciones'        =>$app['request']->get('software_aplicaciones'),
            //OTRO
            'observacion'=>$app['request']->get('observacion'));

        //ACTUALIZAR
        $filasActualizadas = $app['db']->update('estaciones',
                                                $estacion, 
                                                array('id'=>$estacion['id']));
        
        //VERIFICAR QUE SE REALIZÓ LA ACTUALIZACIÓN
        if( $filasActualizadas <= 0 )
        {
            
            //BUSCAR EMPRESAS
            $sql = " SELECT id,nombre FROM empresas "; 
            $empresas = $app['db']->fetchAll($sql, array());

            //BUSCAR GERENCIAS
            $sql = " SELECT id,nombre FROM gerencias "; 
            $gerencias = $app['db']->fetchAll($sql, array());

            //BUSCAR UBICACIONES
            $sql = " SELECT id,nombre FROM ubicaciones "; 
            $ubicaciones = $app['db']->fetchAll($sql, array());

            //BUSCAR MARCAS
            $sql = " SELECT id,nombre FROM marcas "; 
            $marcas = $app['db']->fetchAll($sql, array());

            //BUSCAR SISTEMA OPERATIVO
            $sql = " SELECT id,nombre FROM sistemas_operativos "; 
            $sistemas_operativos = $app['db']->fetchAll($sql, array());
            
            //MENSAJE
            $app['session']->getFlashBag()->add('danger',array('message' => 'No se pudo actualizar la Estación'));
        
            //REGRESAR AL FORMULARIO DATOS
            return $app['twig']->render('estacion/estacion_datos.twig', 
                                        array ('estacion'           =>$estacion,
                                               'empresas'           =>$empresas,
                                               'gerencias'          =>$gerencias,
                                               'ubicaciones'        =>$ubicaciones,
                                               'marcas'             =>$marcas,
                                               'sistemas_operativos'=>$sistemas_operativos,
                                               'editar' => TRUE));
            
        }else{
                    
            //MENSAJE
            $app['session']->getFlashBag()->add('success',array('message' => 'Se actualizó con éxito la Empresa'));
            
            //REDIRECCIONAR AL FORMULARIO LISTAR
            return $app->redirect($app['url_generator']->generate('estacionListar',array('pagina'=>0)));
            
        }
    
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
	
})
->bind('estacionActualizar');