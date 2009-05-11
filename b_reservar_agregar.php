<?php
include_once('m_reservas.php');

/* Extraemos la información que nos interesa */
$descripcion = trim($_POST['descripcion']);
$hora_inicio = trim($_POST['hora_inicio']);
$hora_final  = trim($_POST['hora_final']);
$fecha  = trim($_POST['fecha']);
$local  = trim($_POST['local']);
$canon  = isset($_POST['canon'])  ? 1 : 0;
$laptop = isset($_POST['laptop']) ? 1 : 0;

/* Por si hay algun problema, vamos a dejar lo que ya puso el usuario accesible
 * para la vista, asi no va a tener que rellenar los campos de nuevo */
$vista->descripcion = $descripcion;
$vista->hora_inicio = $hora_inicio;
$vista->hora_final  = $hora_final;
$vista->fecha  = $fecha;
$vista->local  = $local;
$vista->canon  = $canon;
$vista->laptop = $laptop;

/* Ningun campo vacio */
if ($descripcion == '' || $hora_inicio == '' || $hora_final == '' || $local == '') {
  $vista->error = 'Todos los campos son obligatorios.';
  return;    
} 
/* Fecha tambien es obligatoria */
if ($fecha == '') {
  $vista->error = 'Debe de seleccionar una fecha válida.';
  return;
} 
/* Tiene que elegir un equipo a elegir */
if (!$canon && !$laptop) {
  $vista->error = 'Debe de seleccionar al menos un equipo para realizar la solicitud.';
  return;  
} 
/* Horas deben de ser validas */
if ($hora_inicio >= $hora_final) {
  $vista->error = 'Las horas de préstamo y devolución son inválidas.';
  return;
}

/* Convertimos las fechas a formato YYYY-MM-DD hh:mm */
$hora_inicio = date('H:i:00', mktime(0, $hora_inicio));
$hora_final  = date('H:i:00', mktime(0, $hora_final));

/* La insertamos en la base de datos */
$reservas->nuevaReserva($fecha, $hora_inicio, $hora_final, $local, $descripcion, 
  getId(), $canon, $laptop);

/* Como todo termino bien, redireccionamos a la pagina de inicio */
header('Location: index.php');
?>
