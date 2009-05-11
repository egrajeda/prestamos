<?php

/* Extraemos la información que nos interesa */
$descripcion = trim($_POST['descripcion']);
$hora_inicio = trim($_POST['hora_inicio']);
$hora_final = trim($_POST['hora_final']);
$fecha = trim($_POST['fecha']);
$canon = isset($_POST['canon']);
$laptop = isset($_POST['laptop']);
$local = trim($_POST['local']);

/* Validamos la informacion */
if ($descripcion == '' || $hora_inicio == '' || 
    $hora_final == '' || $local == '') {
  $vista->error = 'Todos los campos son obligatorios.';
  return;    
} else if ($fecha == '') {
  $vista->error = 'Debe de seleccionar una fecha válida.';
  return;
} else if (!$canon && !$laptop) {
  $vista->error = 'Debe de seleccionar al menos un equipo para realizar la solicitud.';
  return;
} else if ($hora_inicio >= $hora_final) {
  $vista->error = 'Las horas de préstamo y devolución son inválidas.';
}


?>
