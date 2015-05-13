<?php

/*  
 *  GERENCIA INDEX
 */

$gerencia = $app['controllers_factory'];

require_once __DIR__.'/gerencia_actualizar.php';
require_once __DIR__.'/gerencia_buscar.php';
require_once __DIR__.'/gerencia_eliminar.php';
require_once __DIR__.'/gerencia_guardar.php';
require_once __DIR__.'/gerencia_listar.php';
require_once __DIR__.'/gerencia_nuevo.php';

return $gerencia;