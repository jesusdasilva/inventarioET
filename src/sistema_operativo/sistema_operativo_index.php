<?php

/*  
 *  EMPRESA INDEX
 */

$sistemaOperativo = $app['controllers_factory'];

require_once __DIR__.'/sistema_operativo_actualizar.php';
require_once __DIR__.'/sistema_operativo_buscar.php';
require_once __DIR__.'/sistema_operativo_eliminar.php';
require_once __DIR__.'/sistema_operativo_guardar.php';
require_once __DIR__.'/sistema_operativo_listar.php';
require_once __DIR__.'/sistema_operativo_nuevo.php';

return $sistemaOperativo;