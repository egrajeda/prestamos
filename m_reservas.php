<?php
/**
 * El modelo encargado de la interacción con la base de datos sobre la 
 * información de las reservas.
 */
 
include_once('u_basededatos.php');
  
class Reservas { 
  public function newReserva($fecha, $hora_inicio, $hora_final, $local, $descripcion, $usuario, $canon, $laptop) {
    $query = query("insert into `reservaciones` (`fecha_reserva`, `hora_prestamo`, " .
      "`hora_devolucion`, `aula`, `descripcion`, `id_user`, `canon`, `laptop`)     " .
      "values (':fecha', ':hora_inicio', ':hora_final', ':local', ':descripcion',  " .
      ":usuario, :canon, :laptop)", 
      array(':fecha'       => $fecha      , ':hora_inicio' => $hora_inicio, 
            ':hora_final'  => $hora_final , ':local'       => $local, 
            ':descripcion' => $descripcion, ':usuario'     => $usuario, 
            ':canon'       => $canon      , ':laptop'      => $laptop));
  }
  
  public function setReserva($id, $fecha, $hora_inicio, $hora_final, $local, $descripcion, $usuario, $canon, $laptop) {
    $query = query("update `reservaciones` set `fecha_reserva` = ':fecha', `hora_prestamo` = ':hora_inicio',   " .
      "`hora_devolucion` = ':hora_final', `aula` = ':local', `descripcion` = ':descripcion', `canon` = :canon, " .
      "`laptop` = :laptop where `id_reserva` = :reserva and `id_user` = :usuario",
      array(':fecha'       => $fecha      , ':hora_inicio' => $hora_inicio, 
            ':hora_final'  => $hora_final , ':local'       => $local, 
            ':descripcion' => $descripcion, ':usuario'     => $usuario, 
            ':canon'       => $canon      , ':laptop'      => $laptop,
            ':reserva'     => $id));
  }
  
  public function setReservaEquipo($id, $canon, $laptop) {
    $query = query("update `reservaciones` set `id_canon` = :canon, `id_laptop` = :laptop " .
      "where `id_reserva` = :reserva",
      array(':canon'   => $canon, ':laptop' => $laptop,
            ':reserva' => $id));  
  }
  
  public function getReservas($usuario, $fecha_inicio, $fecha_final) {
    $query = query("select `id_reserva`, `fecha_reserva`, `hora_prestamo`, `hora_devolucion`, " .
      "`aula`, `descripcion`, `canon`, `laptop` from `reservaciones` where      " .
      "`id_user` = :usuario and `fecha_reserva` between ':inicio' and ':final'  ",
      array(':usuario' => $usuario    , ':inicio' => $fecha_inicio, 
            ':final'   => $fecha_final));
    $resultado = array();
    while($row = mysql_fetch_array($query)) {
      $resultado[] = $row;
    }            
    return $resultado;
  } 
  
  public function getReservasDelDia($fecha) {
    $query = query("select * from `reservaciones` as A inner join `usuarios` as B " .
      "on A.`id_user` = B.`id_user` where A.`fecha_reserva` = ':fecha'",
      array(':fecha' => $fecha));
    $resultado = array();
    while($row = mysql_fetch_array($query)) {
      $resultado[] = $row;
    }            
    return $resultado;
  }
  
  public function getReserva($usuario, $reserva) {
    $query = query("select `id_reserva`, `fecha_reserva`, `hora_prestamo`, `hora_devolucion`, " .
      "`aula`, `descripcion`, `canon`, `laptop` from `reservaciones` where      " .
      "`id_user` = :usuario and `id_reserva` = :reserva  ",
      array(':usuario' => $usuario, ':reserva' => $reserva));
    return mysql_fetch_array($query);
  }
  
  public function delReserva($usuario, $reserva) {  
    $query = query("delete from `reservaciones` where `id_user` = :usuario and " .
      "`id_reserva` = :reserva", array(':usuario' => $usuario, ':reserva' => $reserva));
  }
} 

/* Dejamos lista la instancia */
$reservas = new Reservas();
?>
