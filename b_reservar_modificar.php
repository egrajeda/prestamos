<?php
revisarNivel(1);

include_once('m_reservas.php');
include_once('b_reservar_validacion.php');

$vista->id = trim($_POST['id']);

if (isset($vista->error)) {
  return;
}

/* Si todo bem, hacemos la modificaciones en la base de datos */
$reservas->setReserva($vista->id, $fecha, $hora_inicio, $hora_final, $local, 
  $descripcion, getId(), $canon, $laptop);

/* Y nos regresamos al principio */
header('Location: index.php?mod=reservar');
?>
