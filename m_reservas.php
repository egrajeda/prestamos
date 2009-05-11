<?php
/**
 * El modelo encargado de la interacción con la base de datos sobre la 
 * información de las reservas.
 */
 
include_once('u_basededatos.php');
  
class Reservas { 
  public function nuevaReserva($fecha, $hora_inicio, $hora_final, $local, $descripcion, $usuario, $canon, $laptop) {
    $query = query("insert into `reservaciones` (`fecha_reserva`, `hora_prestamo`, " .
      "`hora_devolucion`, `aula`, `descripcion`, `id_user`, `canon`, `laptop`)     " .
      "values (':fecha', ':hora_inicio', ':hora_final', ':local', ':descripcion',  " .
      ":usuario, :canon, :laptop)", 
      array(':fecha'       => $fecha      , ':hora_inicio' => $hora_inicio, 
            ':hora_final'  => $hora_final , ':local'       => $local, 
            ':descripcion' => $descripcion, ':usuario'     => $usuario, 
            ':canon'       => $canon      , ':laptop'      => $laptop));
  }
} 

/* Dejamos lista la instancia */
$reservas = new Reservas();
?>
