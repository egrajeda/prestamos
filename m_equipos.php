<?php
include_once('u_basededatos.php');

class Equipos {
  public function newEquipos($marca, $clase, $identificacion) {
	  $query = query("insert into `equipos` (`nombre`, `tipo`, `serial`) " .
    	"values (':marca', ':clase', ':identificacion')",
    	array(':marca'	        => $marca	        , ':clase' => $clase, 
    	      ':identificacion' => $identificacion));
  }
  
  public function getEquiposPorTipo($tipo) {
    $query = query("select * from `equipos` where `tipo` = ':tipo'",
      array(':tipo' => $tipo));
    $resultado = array();
    while($row = mysql_fetch_array($query)) {
      $resultado[] = $row;
    }            
    return $resultado;         
  }
}

$equipos = new Equipos();

?>
