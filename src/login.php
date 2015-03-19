<?php

$login = $app['controllers_factory'];

//LOGIN
$login->get('/login', function() use ($app) {

	return $app['twig']->render('login.html');

})
->bind('login');

return $login;