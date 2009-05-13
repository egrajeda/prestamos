<?php
revisarNivel('administrador');

include_once('m_agregarusuarios.php');

/* Extraemos la información que nos interesa */
$nombre		    = trim($_POST['nombre']);
$apellido		= trim($_POST['apellido']);
$user           = trim($_POST['user']);
$clave	        = trim($_POST['clave']);
$clave1         = trim($_POST['clave1']);
$departamento   = trim($_POST['departamento']);
$nivel          = trim($_POST['nivel']);

/* Por si hay algun problema, vamos a dejar lo que ya puso el usuario accesible
 * para la vista, asi no va a tener que rellenar los campos de nuevo */
$vista->nombre   = $nombre;
$vista->apellido = $apellido;
$vista->user     = $user;
$vista->clave    = $clave;
$vista->clave1   = $clave1;
$vista->departamento  = $departamento;
$vista->nivel  = $nivel;
/* Ningun campo vacio */
if ($nombre == '' ||$apellido == ''||$user == '' || $clave == '' ||$departamento== ''|| $nivel== '') {
  $vista->error = 'Todos los campos son obligatorios.';
  return;    
} 
if ($clave1!=$clave){
$vista->error = 'Las contraseñas no coinciden.';
  return;    
} 
if((ereg("[0-9]",$nombre)) || (ereg("[0-9]",$apellido))){ 
$vista->error = 'Los campos de nombre y apellido no pueden tener numeros.';
  return;  
} 

/* La insertamos en la base de datos */
$clave=md5($clave);
$user=strtolower($user);
if($usuarios->verificar_usuario($user) == 1){
$vista->error = 'Ya existe ese usuario.';
  return;  
} 

$usuarios->newusuarios($user, $clave, $nombre, $apellido,$departamento, $nivel, getId());

/* Como todo termino bien, redireccionamos a la pagina de inicio */
header('Location: index.php');

?>
