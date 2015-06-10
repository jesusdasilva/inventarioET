<?php

class calcularVlan{
    
    //FUNCION PARA EL CALCULO DE DIRECCIONES IPS PARA ESTACIONES DE TRABAJO
    public static function calcularIPS($primera_ip,$ultima_ip,$red,$broadcast,$gateway){

        //VARIABLES
        $direccion_ip = $primera_ip;
        $rango_ips = array();
        $num_ips = 0;		
        $ip_dec = 0;

        //CALCULAR EL NÚMERO DE IP	
        $num_ips = ip2long($ultima_ip) - ip2long($primera_ip) + 1;

        //GENERAR EL RANGO DE IPS
        for($i=0;$i<$num_ips;$i++){

            //DIRECCIONES EXCLUIDAS
            if($direccion_ip != $red and $direccion_ip != $broadcast and  $direccion_ip != $gateway){
                $rango_ips[] = 	$direccion_ip;		
            }

            //CALCULAR LA SIGUIENTE DIRECCION IP
            $ip_dec = ip2long($direccion_ip)+1;
            $direccion_ip = long2ip($ip_dec);


        }

        return $rango_ips;
    }

    //GENERAR NOMBRE DE ESTACIONES
    public static function generarNombre($num_ips,$prefijo){

        //VARIABLES
        $nombres = array();		
        $l1="A";
        $l2="A";
        $nombre = "";
        $nombre  = $prefijo;
        $nombre .=$l1;
        $nombre .=$l2;


        //GENERAR NOMBRES
        for($i=0;$i<$num_ips;$i++){

            $nombres[] = $nombre; 
            if($l2 == "Z"){
                $l1 = ++$l1;
                $l2 = "A";			
            }else{
                $l2 = ++$l2;		
            }
            $nombre  = $prefijo;
            $nombre .=$l1;
            $nombre .=$l2;

        }	

        return $nombres;
    }
    
    //GENERAR INFORMACIÓN DE LAS ESTACIONES
    public static function generaEstacion($estaciones_nombres,$estaciones_ips,$usuario_nombre,$usuario_indicador,
            $vlan_nombre,$vlan_red,$vlan_mascara,$vlan_broadcast,$vlan_gateway){
        
        //VARIABLES
        $estaciones=array();
        
        foreach(array_combine($estaciones_nombres,$estaciones_ips) as $estacion_nombre => $estacion_ip){
            
            $estaciones [] = array( 'estatus'           => 'Sin Asignar',
                                    'estacion_nombre'   => $estacion_nombre,
                                    'estacion_ip'       => $estacion_ip,
                                    'usuario_nombre'    => $usuario_nombre,
                                    'usuario_indicador' => $usuario_indicador,
                                    'vlan_nombre'       => $vlan_nombre,
                                    'vlan_red'          => $vlan_red,
                                    'vlan_mascara'      => $vlan_mascara,
                                    'vlan_broadcast'    => $vlan_broadcast,
                                    'vlan_gateway'      => $vlan_gateway );
        }
        
        return $estaciones;        
    }


}