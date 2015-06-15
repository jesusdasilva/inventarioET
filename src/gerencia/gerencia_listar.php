<?php

/*
 *  GERENCIA LISTAR
 */

$gerencia->get('/gerencia/listar/{pagina}', function($pagina) use ($app) {

    try{
    
        //CALCULAR LAS PÁGINAS
        $maximoRegistros = 5;
        $sql = " SELECT count( * ) AS numero FROM vista_gerencias "; 
        $numeroRegistro = $app['db']->fetchColumn($sql, array());
        $numeroPaginas = ceil($numeroRegistro / $maximoRegistros) -1;
            
        //SQL DE LOS REGISTROS DE LA PÁGINA
        $offset =  $pagina * 5;
        $sql  = " SELECT * ";
        $sql .= " FROM vista_gerencias ";
        $sql .= " ORDER BY nombre ";
        $sql .= " OFFSET $offset LIMIT 5";
        
        //BUSCAR
        $gerencias = $app['db']->fetchAll($sql, array());

        //MOSTRAR DATOS
        return $app['twig']->render('gerencia/gerencia_listado.twig',  
                                    array('gerencias'      => $gerencias, 
                                          'numeroPaginas'  => $numeroPaginas,
                                          'pagina'         => $pagina,
                                          'numeroRegistro' => $numeroRegistro));
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
    
})
->bind('gerenciaListar');