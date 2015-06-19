<?php

/*  
 *  EMPRESA INDEX
 */

$empresa = $app['controllers_factory'];

require_once __DIR__.'/empresa_actualizar.php';
require_once __DIR__.'/empresa_buscar.php';
require_once __DIR__.'/empresa_eliminar.php';
require_once __DIR__.'/empresa_guardar.php';
require_once __DIR__.'/empresa_listar.php';
require_once __DIR__.'/empresa_nuevo.php';

return $empresa;