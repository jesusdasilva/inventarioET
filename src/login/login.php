<?php

/*
 *  LOGIN
 */

$login->get('/login', function() use ($app) {

        
    return $app['twig']->render('login/login.twig');

})
->bind('login');