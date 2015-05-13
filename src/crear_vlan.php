<?php
require __DIR__.'/../src/calcular_vlan.inc.php';

$crear_vlan = $app['controllers_factory'];

//CREAR VLAN GET
$crear_vlan->get('/crear_vlan', function() use ($app) {

    return $app['twig']->render('crear_vlan.twig');

})
->bind('crear_vlan');

//CREAR VLAN POST
$crear_vlan->post('/crear_vlan', function() use ($app) {

    //RECIBIR LOS DATOS DEL FORMULARIO
    $vlan = array('vlan'       => $app['request']->get('vlan'),
                  'prefijo'    => $app['request']->get('prefijo'),
                  'red'        => $app['request']->get('red'),
                  'primera_ip' => $app['request']->get('primera_ip'),
                  'ultima_ip'  => $app['request']->get('ultima_ip'),
                  'mascara'    => $app['request']->get('mascara'),
                  'broadcast'  => $app['request']->get('broadcast'),
                  'gateway'    => $app['request']->get('gateway'));
    
    //CALCULAR IPS PARA LAS ESTACIONES
    $ips_estaciones = calcular_vlan::calcularIPS($vlan['primera_ip'],
                                   $vlan['ultima_ip'],
                                   $vlan['red'],
                                   $vlan['broadcast'],
                                   $vlan['gateway']);
    
    //GENERANDO NOMBRES PARA LAS ESTACIONES
    $nombres_estaciones = calcular_vlan::generarNombre(count($ips_estaciones),$vlan['prefijo']);

    //GENERAR INFORMACION DE LAS ESTACIONES
    $estaciones = calcular_vlan::generaEstacion($nombres_estaciones,
                                   $ips_estaciones,
                                   'Libre',
                                   'Libre',
                                   $vlan['vlan'],
                                   $vlan['red'],
                                   $vlan['mascara'],                       
                                   $vlan['broadcast'],
                                   $vlan['gateway']);
    
    //AGREGAR A LA BD LA INFORMACIÓN DE LAS ESTACIONES A LA BD
    foreach($estaciones as $estacion){
        
        $app['db']->insert('estaciones',$estacion);
        
    }
    
    //return $app['twig']->render('listado.twig',array('estaciones' => $estaciones));
    
    return $app->redirect($app['url_generator']->generate('inicio'));
    
    

})
->bind('crear_vlan_post');

return $crear_vlan;