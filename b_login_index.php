<?php
include_once('m_usuarios.php');

/* Extraemos la informacion que nos importa */
$usuario = trim($_POST['usuario']);
$clave = trim($_POST['clave']);

/* Obtenemos la contraseña de este usuario */
$clave_bd = $usuarios->getClave($usuario);

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

?>
