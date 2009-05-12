<?php
revisarNivel('normal');

include_once('m_reservas.php');
include_once('b_reservar_validacion.php');

if (isset($vista->error)) {
  return;
}

/* La insertamos en la base de datos */
$reservas->newReserva($fecha, $hora_inicio, $hora_final, $local, $descripcion, 
  getId(), $canon, $laptop);

/* Como todo termino bien, redireccionamos a la pagina de inicio */
header('Location: index.php');
?>
