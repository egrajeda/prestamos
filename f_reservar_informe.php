<?php
revisarNivel('normal');

include_once('m_reservas.php');

/* Las variables que vamos a mostrar en la vista */
$vista->titulo = 'Reservaciones';
$vista->encabezado = 'Informe de solicitud pasada';
$vista->regresar = true;

/* Solamente vamos a ver las solicitudes de la semana pasada */
$vista->dia = date('N');

/* Cargamos las solicitudes y las vamos guardando en un arreglo, donde cada
 * indice corresponde a cada dia */
$vista->vacio = true;   
$vista->solicitudes = array();
for ($dia = 0; $dia < 7; $dia++) {
  $vista->solicitudes[$dia] = $reservas->getReservasDelDiaYUsuario(
    date('Y-m-d', strtotime(sprintf('%d days', $dia-6-$vista->dia))), getId());
  if (count($vista->solicitudes[$dia]) > 0) {
    $vista->vacio = false;
  }
}
$vista->dias = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 
  'Sábado', 'Domingo');
  
presentar('reservar_informe');
?>
