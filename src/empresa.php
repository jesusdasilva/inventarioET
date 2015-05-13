<?php

$empresa = $app['controllers_factory'];

//NUEVO
$empresa->get('/empresa/nueva', function() use ($app) {

    return $app['twig']->render('empresa_datos.twig');

})
->bind('empresaNuevo');

//GUARDAR
$empresa->post('/empresa/guardar', function() use ($app) {

    $empresa = array('nombre'     => $app['request']->get('nombre'),
		     'observacion'=> $app['request']->get('observacion'));

    $filasGuardadas = $app['db']->insert('empresas',$empresa); 
									  
    if( $filasGuardadas <= 0 ){
	//$app['session']->setFlash('error', 'Se ha producido un error al actualizar el elementos');
	 $app['session']->getFlashBag()->add('danger',array('message' => 'Error al guardar la Empresa', ));		
	
         return $app['twig']->render('empresa_datos.twig',array('empresa' => $empresa));
        
    }else{
        
        //$app['session']->getFlashBag()->add('example', 'Some example flash message');
        
        $app['session']->getFlashBag()->add('success',array('message' => 'La Empresa fue creada con éxito', ));
	//$app['session']->setFlash('ok', 'Se ha actualizado correctamente');
		
	return $app->redirect($app['url_generator']->generate('empresaListar',array('pagina'=>0)));
    }

})
->bind('empresaGuardar');

//LISTAR
$empresa->get('/empresa/listar/{pagina}', function($pagina) use ($app) {

    //CALCULAR LAS PAGINAS
    $maximoRegistros = 5;
    $sql = " SELECT count( * ) AS numero FROM empresas "; 
    $numeroEmpresas = $app['db']->fetchColumn($sql, array());
    $numeroPaginas = ceil($numeroEmpresas / $maximoRegistros) -1;
    
    //VERIFICAR QUE LA PÁGINA TODAVIA EXISTA
    if($pagina <= $numeroPaginas ){
        
        $offset =  $pagina * 5;
        $sql  = " SELECT id,nombre,observacion ";
        $sql .= " FROM empresas ";	
        $sql .= " OFFSET $offset LIMIT 5";
        $empresas = $app['db']->fetchAll($sql, array());

        return $app['twig']->render('empresa_listado.twig',array( 'empresas'       => $empresas, 
                                                                  'numeroPaginas'  =>$numeroPaginas,
                                                                  'pagina'         =>$pagina,
                                                                  'numeroEmpresas' => $numeroEmpresas));

    }else{
        //MENSAJE DE ERROR DE PÁGINA
    }

})
->bind('empresaListar');

//BUSCAR
$empresa->get('/empresa/buscar/{id}',function($id) use($app){

    $sql = 'SELECT * FROM empresas WHERE id = ? ';	

    $empresa = $app['db']->fetchAssoc($sql, array($id));

    return $app['twig']->render('empresa_datos.twig',array('empresa' => $empresa));
})
->bind('empresaBuscar');

//ACTUALIZAR
$empresa->post('/empresa/actualizar', function() use ($app) {


    $empresa = array('id'    	    => $app['request']->get('id'),
                     'nombre'       => $app['request']->get('nombre'),
                     'observacion' => $app['request']->get('observacion'));

    $filasActualizadas = $app['db']->update('empresas', 
		                            array('nombre'     => $empresa['nombre'],
		                        	 'observacion'=> $empresa['observacion']), 
					    array('id'=>$empresa['id']));

	if( $filasActualizadas <= 0 )
	{
		//$app['session']->setFlash('error', 'Se ha producido un error al actualizar el elementos');
			
		
		return $app['twig']->render('empresa_datos.html',array('empresa' => $empresa));
	}else{
		
		//$app['session']->setFlash('ok', 'Se ha actualizado correctamente');
		
		return $app->redirect($app['url_generator']->generate('empresaListar',array('pagina'=>0)));
	}
	
})
->bind('empresaActualizar');

//ELIMINAR
$empresa->get('/eliminar/{id}', function($id) use($app){

    $rows = $app['db']->delete('empresas', array('id' => $id));

    if( $rows <= 0 ){

        $app['session']->getFlashBag()->add('danger',array('message' => 'No se pudo eliminar la Empresa'));	
            //$app['session']->setFlash('error', 'Se ha producido un error al actualizar el elementos');

    }else{

        $app['session']->getFlashBag()->add('success',array('message' => 'Se eliminó con éxito la Empresa'));
            //$app['session']->setFlash('ok', 'Se ha actualizado correctamente');
    }

    return $app->redirect($app['url_generator']->generate('empresaListar',array('pagina'=>0)));

})
->bind('empresaEliminar');

return $empresa;