<?php
revisarNivel(1);

include_once('m_reservas.php');

/* Se revisa que en verdad sea viernes o sábado */
$dia = date('N');
if ($dia != 5 && $dia != 6) {
  bloquearEntrada();
}

/* Eliminamos la reserva */
$reserva = trim($_GET['id']);
$reservas->delReserva(getId(), $reserva);

/* Redireccionamos al inicio */
header('Location: index.php?mod=reservar');
?>

