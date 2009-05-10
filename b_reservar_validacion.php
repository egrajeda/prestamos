<?php
revisarNivel(1);

/* Se revisa que en verdad sea viernes o sábado */
$dia = date('N');
if ($dia != 5 && $dia != 6) {
  bloquearEntrada();
}

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
/* Validamos que la fecha este en el rango permitido */
$fecha2 = strtotime($fecha);
if ($dia == 5) {
  if (strtotime(date('Y-m-d', strtotime('+3 days'))) > $fecha2 || 
      strtotime(date('Y-m-d', strtotime('+9 days'))) < $fecha2) {
    $vista->error = 'La fecha se encuentra fuera del rango permitido.';
    return;
  }
} else {
  if (strtotime(date('Y-m-d', strtotime('+2 days'))) > $fecha2 || 
      strtotime(date('Y-m-d', strtotime('+8 days'))) < $fecha2) {
    $vista->error = 'La fecha se encuentra fuera del rango permitido.';
    return;
  }
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

?>
