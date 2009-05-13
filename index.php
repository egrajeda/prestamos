<?php
include_once('u_sesiones.php');
include_once('u_asignador.php');

if(!@$_GET['mod']) {
  $_GET['mod'] = getModuloInicial();
}
asignar(@$_GET['mod'], @$_GET['act']);
?>
