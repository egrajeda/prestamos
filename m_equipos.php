<?php
include_once('u_basededatos.php');

class Equipos {
 public function newEquipos($marca, $clase, $identificacion) {
	$query = query("insert into `equipos` (`nombre`, `tipo`, `serial`)".
	"values (':marca', ':clase', ':identificacion')",
	array(':marca'	=>	$marca	, ':clase' => $clase, ':identificacion' => $identificacion));
}
}

$equipos = new Equipos();

?>
