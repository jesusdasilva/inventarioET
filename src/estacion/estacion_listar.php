<?php

/*
 *  ESTACIÓN LISTAR
 */

require_once 'estacion_listar_sql.inc.php';

$estacion->get('/estacion/listar/{pagina}', function($pagina) use ($app) {

    try{
    
        //CALCULAR LAS PÁGINAS
        $maximoRegistros = 5;
        $sql = " SELECT count( * ) AS numero FROM estaciones "; 
        $numeroRegistro = $app['db']->fetchColumn($sql, array());
        $numeroPaginas = ceil($numeroRegistro / $maximoRegistros) -1;
            
        //SQL DE LOS REGISTROS DE LA PÁGINA
        $offset =  $pagina * 5;
        $sql  = " SELECT * ";
        $sql .= " FROM estaciones ";
        $sql .= " ORDER BY red_ip ";
        $sql .= " OFFSET $offset LIMIT 5";
        
        //BUSCAR ESTACIÓN
        $estaciones = $app['db']->fetchAll($sql, array());

        //ENVIAR DATOS A LA PLANTILLA
        return $app['twig']->render('estacion/estacion_listado.twig',  
                                    array('estaciones'     =>$estaciones, 
                                          'numeroPaginas'  =>$numeroPaginas,
                                          'pagina'         =>$pagina,
                                          'numeroRegistro' =>$numeroRegistro));
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
    
})
->bind('estacionListar');


$estacion->post('/estacion/listar', function() use ($app) {

    try{
    
           
        //DATOS DEL FORMULARIO
        $parametro = $app['request']->get('parametro');
        $buscarPor = $app['request']->get('radios');
        $estatus   = $app['request']->get('checkboxes');

        //CALCULAR LAS PÁGINAS
        $maximoRegistros = 5;
        $sql = GenerarSql($parametro,$buscarPor,$estatus,FALSE);
        $numeroRegistro = count($app['db']->fetchAll($sql, array()));
        $numeroPaginas = ceil($numeroRegistro / $maximoRegistros) -1;
        
        //$app['session']->getFlashBag()->add('danger',array('message' => $numeroRegistro . $sql));

        //SQL DE LOS REGISTROS DE LA PÁGINA
        $sql = GenerarSql($parametro,$buscarPor,$estatus,TRUE);
        
        //BUSCAR ESTACIÓN
        $estaciones = $app['db']->fetchAll($sql, array());



        //$app['session']->getFlashBag()->add('danger',array('message' => $sql));

        //ENVIAR DATOS A LA PLANTILLA
        return $app['twig']->render('estacion/estacion_listado.twig',  
                                    array('estaciones'     =>$estaciones, 
                                          'numeroPaginas'  =>$numeroPaginas,
                                          'pagina'         => 0,
                                          'numeroRegistro' =>$numeroRegistro));
        
        

    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
    
})
->bind('estacionListarPost');