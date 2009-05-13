<?php
revisarNivel(2);

include_once('m_equipos.php');

/* Extraemos la información que nos interesa */
$marca 			= trim($_POST['marca']);
$clase 			= trim($_POST['clase']);
$identificacion = trim($_POST['identificacion']);

/* Por si hay algun problema, vamos a dejar lo que ya puso el usuario accesible
 * para la vista, asi no va a tener que rellenar los campos de nuevo */
$vista->marca = $marca;
$vista->clase = $clase;
$vista->identificacion  = $identificacion;

/* Ningun campo vacio */
if ($marca == '' || $clase == '' || $identificacion == '') {
  $vista->error = 'Todos los campos son obligatorios.';
  return;    
} 

/* La insertamos en la base de datos */
$equipos->newEquipos($marca, $clase, $identificacion, getId());

/* Como todo termino bien, redireccionamos a la pagina de inicio */
header('Location: index.php');
?>
