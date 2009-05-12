<?php
include_once('u_basededatos.php');

class Equipos {
  public function newEquipos($clase, $identificacion) {
	  $query = query("insert into `equipos` (`tipo`, `numero`) " .
    	"values (':clase', :identificacion)",
    	array(':clase' => $clase, ':identificacion' => $identificacion));
  }
  
  public function verificarEquipo($clase, $identificacion) {
    $query = query("select * from `equipos` where `tipo` = ':clase' and " .
      "`numero` = :identificacion", array(':clase' => $clase, ':identificacion' => $identificacion));
    if (mysql_num_rows($query)) {
      return 1;
    }
    return 0;  
  }
    
  public function getEquipos() {
    $query = query("select * from `equipos` order by `tipo`, `numero`");
    $resultado = array();
    while ($row = mysql_fetch_array($query)) {
      if ($row['tipo'] == 'canon') {
        $row['nombre'] = 'Cañon ' . $row['numero'];
      } else {
        $row['nombre'] = 'Laptop ' . $row['numero'];
      }    
      $resultado[] = $row;
    }
    return $resultado;
  }
  
  public function getEquiposPorTipo($tipo) {
    $query = query("select * from `equipos` where `tipo` = ':tipo' order by `tipo`, `numero`",
      array(':tipo' => $tipo));
    $resultado = array();
    while ($row = mysql_fetch_array($query)) {
      if ($tipo == 'canon') {
        $row['nombre'] = 'Cañon ' . $row['numero'];
      } else {
        $row['nombre'] = 'Laptop ' . $row['numero'];
      }
      $resultado[] = $row;
    }            
    return $resultado;         
  }
  
  public function delEquipo($equipo) {
    /* Primero "desasignamos" todas las solicitudes a las que se habia asignado */
    $query = query("update `reservaciones` set `id_laptop` = null where " .
      "`id_laptop` = :laptop", array(':laptop' => $equipo));
    $query = query("update `reservaciones` set `id_canon` = null where " .
      "`id_canon` = :canon", array(':canon' => $equipo));      

    /* Ahora si eliminamos el equipo */  
    $query = query("delete from `equipos` where `id_equipo` = :equipo",
      array(':equipo' => $equipo));
  }  
}

$equipos = new Equipos();
?>
