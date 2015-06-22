<?php

use Silex\Application;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
//use Silex\Provider\SecurityServiceProvider;

$app = new Application();

$app->register(new UrlGeneratorServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());

$app->register(new DoctrineServiceProvider(), 
               array('db.options' => array( 'driver'   => 'pdo_pgsql',
                                            'host'     => 'localhost',
                                            'dbname'   => 'inventariodb',
                                            'user'     => 'inventario',
                                            'password' => '123',
                                            'charset'  => 'utf8',),
));

$app['twig'] = $app->share($app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
}));


return $app;
