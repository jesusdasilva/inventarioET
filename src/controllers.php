<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html', array());
})->bind('ingres_field_precision(result, index)');


//LOGIN
$app->mount('/', include __DIR__.'/../src/login.php');

//LISTADO
$app->mount('/', include __DIR__.'/../src/listado.php');

//EDITAR
$app->mount('/', include __DIR__.'/../src/editar.php');

//NUEVO
$app->mount('/', include __DIR__.'/../src/nuevo.php');

//ACTUALIZAR
$app->mount('/', include __DIR__.'/../src/actualizar.php');

//ELIMINAR
$app->mount('/', include __DIR__.'/../src/eliminar.php');

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});


