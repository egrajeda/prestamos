<?php
revisarNivel('administrador');

include_once('m_reservas.php');
include_once('m_equipos.php');
include_once('b_administrar_validacion.php');

/* Primero hacemos una ronda con todos aquellos 'desasignaciones' que hicimos */
foreach ($canones as $reserva => $canon) {
  if ($canon == -1) {
    $reservas->setReservaCanon($reserva, 'NULL'); 
  }
  if ($laptops[$reserva] == -1) {
    $reservas->setReservaLaptop($reserva, 'NULL');   
  }
}

/* En la segunda, ya asignamos de verdad, verificando los conflictos */
$vista->conflictosCanon  = array();
$vista->conflictosLaptop = array();
foreach ($canones as $reserva => $canon) {
  if ($canon != -1) {
    /* Deben de haber 0 reservas con este canon asignado en este intervalo de
     * tiempo */
    if ($reservas->getReservaConCanon($reserva, $canon, $fechas[$reserva], 
        $horas_inicio[$reserva], $horas_final[$reserva]) == 0) {
      $reservas->setReservaCanon($reserva, $canon);    
    } else {
      $vista->error = 'Algunas de las asignaciones no se pudieron llevar a cabo debido a conflictos en su disponibilidad.';
      /* En la vista mostramos un (!) donde hubo problemas */
      $vista->conflictosCanon[$reserva] = true;
    }
  }
  if ($laptops[$reserva] != -1) {
    /* Deben de haber 0 reservas con esta laptop asignado en este intervalo de
     * tiempo */
    if ($reservas->getReservaConLaptop($reserva, $laptops[$reserva], $fechas[$reserva], 
        $horas_inicio[$reserva], $horas_final[$reserva]) == 0) {
      $reservas->setReservaLaptop($reserva, $laptops[$reserva]);    
    } else {
      $vista->error = 'Algunas de las asignaciones no se pudieron llevar a cabo debido a conflictos en su disponibilidad.';
      /* En la vista mostramos un (!) donde hubo problemas */
      $vista->conflictosLaptop[$reserva] = true;
    }
  }
}

?>
