<?php
revisarNivel(2);

include_once('m_usuarios.php');

/* Extraemos la información que nos interesa */
$nombre		    = trim($_POST['nombre']);
$apellido	    = trim($_POST['apellido']);
$user         = trim($_POST['user']);
$clave	      = trim($_POST['clave']);
$clave1       = trim($_POST['clave1']);
$departamento = trim($_POST['departamento']);
$nivel_normal = isset($_POST['nivel_normal']) ? 1 : 0;
$nivel_admin  = isset($_POST['nivel_admin'])  ? 1 : 0;

/* Por si hay algun problema, vamos a dejar lo que ya puso el usuario accesible
 * para la vista, asi no va a tener que rellenar los campos de nuevo */
$vista->nombre       = $nombre;
$vista->apellido     = $apellido;
$vista->user         = $user;
$vista->clave        = $clave;
$vista->clave1       = $clave1;
$vista->departamento = $departamento;
$vista->nivel_normal = $nivel_normal;
$vista->nivel_admin  = $nivel_admin;
/* Ningun campo vacio */
if ($nombre == '' ||$apellido == ''||$user == '' || $clave == '' ||$departamento== '') {
  $vista->error = 'Todos los campos son obligatorios.';
  return;    
} 
if ($clave1!=$clave){
  $vista->error = 'Las contrase&ntilde;as no coinciden.';
  return;    
} 
if ((ereg("[0-9]",$nombre)) || (ereg("[0-9]",$apellido))){ 
  $vista->error = 'Los campos de nombre y apellido no pueden tener numeros.';
  return;  
} 
if (!$nivel_normal && !$nivel_admin) {
  $vista->error = 'Debe de seleccionar al menos un rol para el usuario.';
  return;  
} 
/* La insertamos en la base de datos */
$clave = md5($clave);
$user  = strtolower($user);
if ($usuarios->verificarUsuario($user) == 1) {
  $vista->error = 'Ya existe un usuario con ese identificador.';
  return;  
} 

/* Calculamos el nivel */
$nivel = $nivel_normal*1 + $nivel_admin*2;
$usuarios->newUsuario($user, $clave, $nombre, $apellido, $departamento, $nivel);

/* Como todo termino bien, redireccionamos a la pagina de inicio */
header('Location: index.php?mod=usuario');
?>
