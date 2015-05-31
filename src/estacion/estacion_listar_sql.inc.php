<?php

function GenerarSql($parametro,$buscarPor,$estatus){
        
    //VARIABLES
    $sql = 'SELECT * FROM estaciones ';
    $where   = "";
    $orderBy = "";

    //ARMAR EL SQL SEGÚN LA SELECCIÓN
    switch ($buscarPor){

        case 'usuario_nombre':{

            if(!empty($parametro))
            
                $where   = " WHERE usuario_nombre LIKE '%".$parametro."%' ";
            
            $orderBy = " ORDER BY usuario_nombre ";
            
            break;
        }
        case 'red_hostname':{

            if(!empty($parametro))
            
                $where   = " WHERE red_hostname LIKE '%".$parametro."%' ";
            
            $orderBy = " ORDER BY red_hostname ";
            
            break;
        }
        case 'red_ip':{

            if(!empty($parametro))
            
                $where   = " WHERE red_ip LIKE '%".$parametro."%' ";
            
            $orderBy = " ORDER BY red_ip ";
            
            break;
        }
        case 'usuario_empresa':{
             
             if(!empty($parametro))   
             
                $where   = " WHERE usuario_empresa LIKE '%".$parametro."%' ";
        
            $orderBy = " ORDER BY usuario_empresa ";
        
            break;
        
        }

        default :{
            break;
        
        }
    }


    if(!empty($estatus)) {
        
        foreach($estatus as $check) {

            if(empty($where))
    
                $where .= " WHERE "; 
            
            else
            
                $where .= " AND ";         
            
            $where .= " estatus LIKE '%". $check."%' ";  
        }
    }


    	
    $sql .= $where;
    $sql .= $orderBy;
    $sql .= " OFFSET 0 LIMIT 5";

    return $sql;
    }
