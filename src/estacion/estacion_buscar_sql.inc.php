<?php

class listar_sql {
   
    
    public static function GenerarSql($parametro,$vlan,$selecion){
        
        //VARIABLES
        $sql     = "";
        $where   = "";
        $orderBy = "";
        
        
        //ARMAR EL SQL SEGÚN LA SELECCIÓN
        switch ($selecion){

            case 'nombre':{
                $where   = " WHERE estacion_nombre LIKE \"".$parametro."\" ";
                $orderBy = " ORDER BY estacion_nombre ";
                break;
            }
            case 'usuario':{
                $where   = " WHERE usuario_nombre LIKE \"".$parametro."\" ";
                $orderBy = " ORDER BY usuario_nombre ";
                break;
            }
            case 'ip':{
                $where   = " WHERE direccion_ip LIKE \"".$parametro."\" ";
                $orderBy = " ORDER BY direccion_ip ";
                break;
            }
            default :{
                break;
            }
        }

        if ($vlan != "TODAS"){
         $where .= " AND vlan_nombre LIKE \"". $vlan."\" ";   
        }

        $sql = 'SELECT id_estacion,estacion_nombre,usuario_nombre,estacion_ip,vlan_nombre FROM estaciones ';	
        $sql .= $where;
        $sql .= $orderBy;

        return $sql;
    }
}
