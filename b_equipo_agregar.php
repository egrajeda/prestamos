<?php
revisarNivel(2);

include_once('m_equipos.php');

/* Extraemos la información que nos interesa */
$clase 			    = trim(@$_POST['clase']);
$identificacion = trim($_POST['identificacion']);

/* Por si hay algun problema, vamos a dejar lo que ya puso el usuario accesible
 * para la vista, asi no va a tener que rellenar los campos de nuevo */
$vista->clase           = $clase;
$vista->identificacion  = $identificacion;

/* Ningun campo vacio */
if ($clase == '' || $identificacion == '') {
  $vista->error = 'Todos los campos son obligatorios.';
  return;    
} 
/* El numero debe de ser de verdad un numero */ 
if (!preg_match('/^[0-9]+$/', $identificacion)) {
  $vista->error = 'El campo número debe de contener únicamente números.';
  return;
}
/* No debe de existir ningun equipo del mismo tipo con el mismo número */
if ($equipos->verificarEquipo($clase, $identificacion)) {
  $vista->error = 'Ya existe un equipo del tipo elegido con el número especificado.';
  return;
}

/* La insertamos en la base de datos */
$equipos->newEquipos($clase, $identificacion);

/* Como todo termino bien, redireccionamos a la pagina de inicio */
header('Location: index.php?mod=equipo');
?>
