<?php

/*
 *  LOGIN
 */

$login->get('/login', function() use ($app) {

    //ELIMINAR SESIÓN
    $app['session']->remove('indicador');
    $app['session']->remove('nombre');

    return $app['twig']->render('login/login.twig');

})
->bind('login');

$login->post('/login/verificar_acceso',function() use ($app){

	try{

		//DATOS DEL FORULARIO
		$indicador = $app['request']->get('indicador');
        $clave     = $app['request']->get('clave');
        
        //SQL
        $sql = 'SELECT * FROM usuarios WHERE indicador = ? AND clave = ?';        

        //BUSCAR ID
        $usuarioValido = $app['db']->fetchAssoc($sql,array($indicador,$clave));

		//VERIFICAR AL USUARIO
        if($usuarioValido){

            //GUARDAR LA SESIÓN
            $app['session']->set('indicador',$usuarioValido['indicador']);
            $app['session']->set('nombre',$usuarioValido['nombre']);


            //REDIRECCIONAR AL INICIO
            return $app->redirect($app['url_generator']->generate('inicio')); 
        
        }else{

            //MENSAJE                  
            $app['session']->getFlashBag()->add('danger',array('message' => 'Usuario o Clave inválida'));   

            //REDIRECCIONAR AL FORMULARIO LISTAR
            return $app->redirect($app['url_generator']->generate('login'));    

        }


	} catch (Exception $e) {

        //MENSAJE
        $app['session']->getFlashBag()->add('danger',array('message' => $e->getMessage()));
        
        //MOSTRAR MENSAJE ERROR
        return $app['twig']->render('mensaje_error.twig');   

	}
})
->bind('verificar_acceso');