<?php
/*
ENTIDAD EMPRESA
 */
 class Empresa {
 	
 	private id;
 	private nombre;
 	private observacion;

	public __construc($data){

		$this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->nombre = (!empty($data['nombre'])) ? $data['nombre'] : null;
        $this->observacion  = (!empty($data['observacion'])) ? $data['observacion'] : null;
 			
	}

	publict function getId(){ return $this->id; }
	publict function getNombre(){ return $this->nombre; }
	publict function getObservacion(){ return $this->observacion; }
 }
 /*
 TABLA EMPRESA
  */
 class EmpresaTabla{

 	private empresa;
 	private nombreTabla = 'empresas';
  	
 	function __construc($data){

 		$this->empresa = new Empresa($data);
 	}

 	public function CrearActualizar(){
  

 		if(!$this->empresa->getNombre()){
 		
 			 //CREAR EMPRESA
		    $filasGuardadas = $app['db']->insert($this->nombreTabla,array($this->empresa->getId(),
														    	          $this->empresa->getNombre(),
														    	          $this->empresa->getObservacion(),);
 		
 		}else{
 	
 			//ACTULIZAR
	        $filasActualizadas = $app['db']->update($this->nombreTabla, 
                                              array('observacion'=> $empresa['observacion']), 
                                              array('id'=>$empresa['id']));

 		}
 	}
 }