<?php
revisarNivel('normal');

include_once('m_reservas.php');

/* Las variables que vamos a mostrar en la vista */
$vista->titulo = 'Reservaciones';
$vista->encabezado = 'Solicitud de recurso audiovisual';

/* Debemos de saber el dia, para asi bloquear las reservas o no */
$vista->dia = date('N');

/* Dependiendo del dia, generamos los rangos de fechas de la semana siguiente */
if ($vista->dia == 5) {
  $fecha_inicio = date('Y-m-d', strtotime('+2 days'));
  $fecha_final  = date('Y-m-d', strtotime('+8 days'));  
} elseif ($vista->dia == 1) {
  $fecha_inicio = date('Y-m-d', strtotime('+0 days'));
  $fecha_final  = date('Y-m-d', strtotime('+6 days'));
}

/* Cargamos las solicitudes de esta semana para mostrarlas */
$vista->solicitudes = $reservas->getReservas(getId(), $fecha_inicio, $fecha_final);

presentar('reservar');
?>
