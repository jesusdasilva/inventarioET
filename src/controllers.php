<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//Request::setTrustedProxies(array('127.0.0.1'));

/*$app->get('/', function () use ($app) {
    return $app['twig']->render('index.html', array());
})->bind('ingres_field_precision(result, index)');
*/


//LOGIN
$app->mount('/', include __DIR__.'/../src/login/login_index.php');

//INICIO
$app->mount('/', include __DIR__.'/../src/inicio/inicio_index.php');


//EMPRESA
$app->mount('/', include __DIR__.'/../src/empresa/empresa_index.php');
//GERENCIA
$app->mount('/', include __DIR__.'/../src/gerencia/gerencia_index.php');
//UBICACIÓN
$app->mount('/', include __DIR__.'/../src/ubicacion/ubicacion_index.php');
//MARCA
$app->mount('/', include __DIR__.'/../src/marca/marca_index.php');
//SISTEMA OPERATIVO
$app->mount('/', include __DIR__.'/../src/sistema_operativo/sistema_operativo_index.php');
//ESTACION
$app->mount('/', include __DIR__.'/../src/estacion/estacion_index.php');


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


