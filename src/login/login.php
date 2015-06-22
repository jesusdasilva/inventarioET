<?php

/*
 *  LOGIN
 */

$login->get('/login', function() use ($app) {

    $app['session']->remove('usuario');    
    return $app['twig']->render('login/login.twig');

})
->bind('login');

$login->post('/login/verificar_acceso',function() use ($app){

	try{

		//DATOS DEL FORULARIO
		$usuario = trim($app['request']->get('usuario'));
        $clave 	 = trim($app['request']->get('clave'));
        
        //SQL
        $sql = 'SELECT * FROM usuarios WHERE usuario = ? AND clave = ?';        

        //BUSCAR ID
        $usuarioValido = $app['db']->fetchColumn($sql,array($usuario,$clave));

		//VERIFICAR AL USUARIO
        if($usuarioValido){

            $app['session']->set('usuario', $usuario);
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