<?php
revisarNivel(1);

include_once('m_reservas.php');

/* Las variables que vamos a mostrar en la vista */
$vista->titulo     = 'Gestión de equipo audiovisual';
$vista->encabezado = 'Solicitudes de recursos audiovisuales';

/* Debemos de saber el dia, para asi bloquear las reservas o no */
$vista->dia = date('N');

/* Dependiendo del dia, generamos los rangos de fechas de la semana siguiente */
if ($vista->dia == 5) {
  $fecha_inicio = date('Y-m-d', strtotime('+3 days'));
  $fecha_final  = date('Y-m-d', strtotime('+9 days'));  
} elseif ($vista->dia == 6) {
  $fecha_inicio = date('Y-m-d', strtotime('+2 days'));
  $fecha_final  = date('Y-m-d', strtotime('+8 days'));
} else {
  $vista->otrodia = true;
}

/* Cargamos las solicitudes de esta semana para mostrarlas */
if (@$vista->otrodia) {
  $vista->solicitudes = array();
} else {
  $vista->solicitudes = $reservas->getReservas(getId(), $fecha_inicio, $fecha_final);
}

presentar('reservar');
?>
