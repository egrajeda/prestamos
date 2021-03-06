<?php
include_once('m_usuarios.php');

/* Extraemos la informacion que nos importa */
$usuario = trim($_POST['usuario']);
$clave = trim($_POST['clave']);

/* Obtenemos la contraseña de este usuario */
list($id_bd, $clave_bd, $nivel_bd) = $usuarios->getInformacion($usuario);

/* Revisamos si existe */
if (!$clave_bd) {
  $vista->error = 'La información del usuario es incorrecta.';
  return;
}

/* Si existe deben de coincidir */
if ($clave_bd != md5($clave)) {
  $vista->error = 'La informacion del usuario es incorrecta.';
  return;
}

/* Si llegamos hasta aqui es porque todo esta bueno, creamos la sesion */
$_SESSION['nivel'] = $nivel_bd;
$_SESSION['usuario'] = $usuario;
$_SESSION['id'] = $id_bd;

/* Enviamos de regreso al index, porque ahora si ha iniciado sesion, y debe
 * de ir a parar a otro lado */
header('Location: index.php');
?>
