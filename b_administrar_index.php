<?php
revisarNivel('administrar');

include_once('m_reservas.php');
include_once('m_equipos.php');
include_once('b_administrar_validacion.php');

/* Vamos recorriendo, uno por uno, las reservas y vamos actualizando su
   equipo */
foreach ($canones as $reserva => $canon) {
  $canon  = $canon == -1 ? 'NULL' : $canon;
  $laptop = $laptops[$reserva] == -1 ? 'NULL' : $laptops[$reserva];
  $reservas->setReservaEquipo($reserva, $canon, $laptop);
}

?>
