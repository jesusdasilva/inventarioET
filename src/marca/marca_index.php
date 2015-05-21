<?php

/*  
 *  MARCA INDEX
 */

$marca = $app['controllers_factory'];

require_once __DIR__.'/marca_actualizar.php';
require_once __DIR__.'/marca_buscar.php';
require_once __DIR__.'/marca_eliminar.php';
require_once __DIR__.'/marca_guardar.php';
require_once __DIR__.'/marca_listar.php';
require_once __DIR__.'/marca_nuevo.php';

return $marca;