<?php
include_once('u_sesiones.php');
include_once('u_asignador.php');

$nivel = getNivel();
if ($nivel == 'administrador') {
  asignar('administrar');
} elseif ($nivel == 'normal') {
  asignar('reservar');  
} else {
  asignar('login');
}
?>
