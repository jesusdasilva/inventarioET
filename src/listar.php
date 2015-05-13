<?php

require __DIR__.'/../src/listar_sql.inc.php';

$listar = $app['controllers_factory'];

$listar->get('/listar', function() use($app){
    
    $maximoRegistros = 5;
    $sql = " SELECT count( * ) AS numero FROM estaciones "; 
    $numeroEstaciones = $app['db']->fetchColumn($sql, array());
    $numeroPaginas = ceil($numeroEstaciones / $maximoRegistros) -1;
    
    $sql  = " SELECT id_estacion,estacion_nombre,usuario_nombre,estacion_ip,vlan_nombre ";
    $sql .= " FROM estaciones ";	
    $sql .= " LIMIT 0 , 5";
    $estaciones = $app['db']->fetchAll($sql, array());
    
    
    return $app['twig']->render('listado_paginado.twig', array('estaciones' => $estaciones, 
                                                               'parametro'=>'todas',
                                                               'vlan'=>'petromonagas',
                                                               'opcion' =>'activas',
                                                               'numeroPaginas'=>$numeroPaginas,
                                                               'pagina'=>'0',
                                                               'numeroEstaciones' => $numeroEstaciones));
        
})
->bind('listar');

$listar->get('/listar/{parametro}/{vlan}/{opcion}/{pagina}', function($parametro,$vlan,$opcion,$pagina) use($app){
    
    //$sql = listar_sql::GenerarSql($parametro,$vlan,$opcion,$pagina);
    
    //CALCULAR LAS PAGINAS
    $maximoRegistros = 5;
    $sql = " SELECT count( * ) AS numero FROM estaciones "; 
    $numeroEstaciones = $app['db']->fetchColumn($sql, array());
    $numeroPaginas = ceil($numeroEstaciones / $maximoRegistros) -1;
    
    //VERIFICAR QUE LA PÁGINA TODAVIA EXISTA
    if($pagina <= $numeroPaginas ){
        
        //LISTAR LA PÁGINA
        $limit = $pagina * 5;
        $sql  = " SELECT id_estacion,estacion_nombre,usuario_nombre,estacion_ip,vlan_nombre ";
        $sql .= " FROM estaciones ";	    
        $sql .= " LIMIT $limit, 5";
        $estaciones = $app['db']->fetchAll($sql, array());
    
        
    }else{
        //MENSAJE DE ERROR DE PÁGINA
    }
    
    return $app['twig']->render('listado_paginado.twig', array('estaciones'      => $estaciones, 
                                                               'parametro'       =>'todas',
                                                               'vlan'            =>'petromonagas',
                                                               'opcion'          =>'activas',
                                                               'numeroPaginas'   =>$numeroPaginas,
                                                               'pagina'          =>$pagina,
                                                               'numeroEstaciones'=>$numeroEstaciones));
    
})
->bind('listar_paginado');

$listar->post('/listar', function() use($app){
    
    //DATOS DEL FORMULARIO
    $parametro = $app['request']->get('parametro');
    $vlan      = $app['request']->get('vlan');
    $selecion  = $app['request']->get('radios');
    
    $sql = listar_sql::GenerarSql($parametro,$vlan,$selecion);
    
    $estaciones = $app['db']->fetchAll($sql, array());

    return $app['twig']->render('listado.twig', array('estaciones' => $estaciones));
    
})
->bind('listar_post');



return $listar;