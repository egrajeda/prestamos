<?php
/**
 * El modelo encargado de la interacción con la base de datos sobre la 
 * información de los usuarios.
 */
 
include_once('u_basededatos.php');
  
class Usuarios { 
  public function newUsuario($usuario, $clave, $nombre, $apellido, $departamento, $nivel) {
    $query = query("insert into `usuarios` (`usuario`, `clave`, `Nombre`, `Apellido`,`departamento`, `nivel`)".
    	"values (':usuario', ':clave', ':nombre', ':apellido',':departamento', ':nivel')",
    	array(':usuario'      => $usuario     , ':clave'    => $clave,
    	      ':nombre'       => $nombre      , ':apellido' => $apellido,
    	      ':departamento' => $departamento, ':nivel'    => $nivel));
  }
  
  public function verificarUsuario($usuario) {
    $query = query("select * from `usuarios` where `usuario`=':usuario'",
      array(':usuario' => $usuario));
    if (mysql_num_rows($query)) {
      return 1;
    }
    return 0;
  }

  public function getInformacion($usuario) {
    $query = query("select `id_user`, `clave`, `nivel` from `usuarios` where `usuario` = ':usuario'",
      array(':usuario' => $usuario));  
    $clave = mysql_fetch_row($query);
    return $clave;
  } 
} 

/* Dejamos lista la instancia */
$usuarios = new Usuarios();
?>
