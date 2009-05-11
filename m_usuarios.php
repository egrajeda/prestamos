<?php
/**
 * El modelo encargado de la interacción con la base de datos sobre la 
 * información de los usuarios.
 */
 
include_once('u_basededatos.php');
  
class Usuarios { 
  public function getClaveYNivel($usuario) {
    $query = query("select `clave`, `nivel` from `usuarios` where `usuario` = ':usuario'",
      array(':usuario' => $usuario));  
    $clave = mysql_fetch_row($query);
    return $clave;
  } 
} 

/* Dejamos lista la instancia */
$usuarios = new Usuarios();

?>
