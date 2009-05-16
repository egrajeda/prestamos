<?php
revisarNivel(1);

include_once('m_reservas.php');

/* Las variables que vamos a mostrar en la vista */
$vista->titulo     = 'Gestión de equipo audiovisual';
$vista->encabezado = 'Informe de solicitudes pasadas';
$vista->regresar = 'mod=reservar';

/* Solamente vamos a ver las solicitudes de la semana pasada */
$vista->dia = date('N');

/* Cargamos las solicitudes y las vamos guardando en un arreglo, donde cada
 * indice corresponde a cada dia */
$vista->vacio = true;   
$vista->solicitudes = array();
for ($dia = 0; $dia < 7; $dia++) {
  $vista->solicitudes[$dia] = $reservas->getReservasDelDiaYUsuario(
    date('Y-m-d', strtotime(sprintf('+%d days', 1+$dia-$vista->dia))), getId());
  if (count($vista->solicitudes[$dia]) > 0) {
    $vista->vacio = false;
  }
}
$vista->dias = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 
  'Sábado', 'Domingo');
  
/* La semana en que estamos */
$meses = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
  'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
$vista->dia_inicial = date('d', strtotime(sprintf('+%d days', 1-$vista->dia)));
$vista->dia_final   = date('d', strtotime(sprintf('+%d days', 7-$vista->dia)));
$vista->mes_final   = $meses[date('n', strtotime(sprintf('+%d days', 7-$vista->dia)))-1];  
  
presentar('reservar_informe');
?>
