<?php

/*
 *  MARCA LISTAR
 */

$marca->get('/marca/listar/{pagina}', function($pagina) use ($app) {

    try{
    
        //CALCULAR LAS PÁGINAS
        $maximoRegistros = 5;
        $sql = " SELECT count( * ) AS numero FROM marcas "; 
        $numeroRegistro = $app['db']->fetchColumn($sql, array());
        $numeroPaginas = ceil($numeroRegistro / $maximoRegistros) -1;
            
        //SQL DE LOS REGISTROS DE LA PÁGINA
        $offset =  $pagina * 5;
        $sql  = " SELECT * ";
        $sql .= " FROM marcas ";
        $sql .= " ORDER BY nombre ";
        $sql .= " OFFSET $offset LIMIT 5";
        
        //BUSCAR MARCA
        $marcas = $app['db']->fetchAll($sql, array());

        //ENVIAR DATOS A LA PLANTILLA
        return $app['twig']->render('marca/marca_listado.twig',  
                                    array('marcas'       => $marcas, 
                                          'numeroPaginas'  =>$numeroPaginas,
                                          'pagina'         =>$pagina,
                                          'numeroRegistro' => $numeroRegistro));
    //CAPTURAR ERROR
    }catch (Exception $e) {
     
        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');        
        
    }
    
})
->bind('marcaListar');