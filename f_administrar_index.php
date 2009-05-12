<?php
revisarNivel('administrador');

include_once('m_reservas.php');
include_once('m_equipos.php');

/* Las variables que vamos a mostrar en la vista */
$vista->titulo = 'Reservaciones';
$vista->encabezado = 'Administración';

/* Cargamos las solicitudes y las vamos guardando en un arreglo, donde cada
 * indice corresponde a cada dia */
$vista->dia = date('N');
$vista->vacio = true;
$vista->solicitudes = array();
for ($dia = 0; $dia < 7; $dia++) {
  $vista->solicitudes[$dia] = $reservas->getReservasDelDia(
    date('Y-m-d', strtotime(sprintf('+%d days', 1+$dia-$vista->dia))));  
  if (count($vista->solicitudes[$dia]) > 0) {
    $vista->vacio = false;
  }
}
$vista->dias = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 
  'Sábado', 'Domingo');
  
/* Obtenemos los cañones y laptops en existencia */
$vista->canones = $equipos->getEquiposPorTipo('canon');
$vista->laptops = $equipos->getEquiposPorTipo('laptop');

presentar('administrar');
?>
