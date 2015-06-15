<?php
/*
  ESTACIÓN CREAR VLAN
 */

//INCLUIR LA CLASE PARE CALCULAR LA VLAN
require_once 'estacion_crear_vlan_calcular.inc.php';

//CREAR VLAN GET
$estacion->get('/estacion/crear_vlan', function() use ($app) {

    return $app['twig']->render('estacion/estacion_crear_vlan.twig');

})
->bind('estacionCrearVlan');

//CREAR VLAN POST
$estacion->post('/estacion/crear_vlan', function() use ($app) {

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
    $ips_estaciones = calcularVlan::calcularIPS($vlan['primera_ip'],
                                   $vlan['ultima_ip'],
                                   $vlan['red'],
                                   $vlan['broadcast'],
                                   $vlan['gateway']);
    
    //GENERANDO NOMBRES PARA LAS ESTACIONES
    $nombres_estaciones = calcularVlan::generarNombre(count($ips_estaciones),$vlan['prefijo']);

    //GENERAR INFORMACION DE LAS ESTACIONES
    $estaciones = calcularVlan::generaEstacion($nombres_estaciones,
                                               $ips_estaciones,
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
->bind('estacionCrearVlanPost');