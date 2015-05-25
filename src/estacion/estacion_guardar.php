<?php

/*
 *  ESTACIÓN GUARDAR NUEVO
 */
require_once 'estaciones_registros.php';

$estacion->post('/estacion/guardar', function() use ($app) {

    try{
        
        //DATOS DEL FORMULARIO
        $estacion = array( 'estatus'=>$app['request']->get('estatus'),
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
    
        //BUSCAR HOSTNAME DE LA ESTACIÓN
        $buscarSql = " SELECT * FROM estaciones WHERE red_hostname = ? ";
        $hostnameEncontrado = $app['db']->fetchAssoc($buscarSql, array($estacion['red_hostname']));
    
        //VERIFICAR QUE NO ESTE REPETIDA
        if($hostnameEncontrado) throw new Exception('Error, el nombre de la Hostaname está repetido.'); 
        
        //GUARDAR ESTACIÓN
        $filasGuardadas = $app['db']->insert('estaciones',$estacion); 
									  
        //VERIFICAR QUE SE GUARDÓ
        if( $filasGuardadas <= 0 ) throw new Exception('Error al guardar la Estación.');
        
        //MENSAJE  
        $app['session']->getFlashBag()->add('success',array('message' => 'La Estación fue creada con éxito'));
		
        //REDIRECCIONAR A LISTAR
        return $app->redirect($app['url_generator']->generate('estacionListar',array('pagina'=>0)));
        
    //CAPTURAR LOS ERRORES    
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
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


        //REGRESAR A LA PLANTILLA DE DATOS
        return $app['twig']->render('estacion/estacion_datos.twig', 
                                    array ('estacion'           =>$estacion,
                                           'empresas'           =>$empresas,
                                           'gerencias'          =>$gerencias,
                                           'ubicaciones'        =>$ubicaciones,
                                           'marcas'             =>$marcas,
                                           'sistemas_operativos'=>$sistemas_operativos,
                                           'editar' => FALSE));
        
    }

})
->bind('estacionGuardar');