<?php
revisarNivel('normal');

include_once('m_reservas.php');

/* Eliminamos la reserva */
$reserva = trim($_GET['id']);
$reservas->delReserva(getId(), $reserva);

/* Redireccionamos al inicio */
header('Location: index.php');
?>

