<?php
revisarNivel(1);

/* Se revisa que en verdad sea viernes o sábado */
$dia = date('N');
if ($dia != 5 && $dia != 6) {
  bloquearEntrada();
}

/* Las variables que vamos a mostrar en la vista */
$vista->titulo     = 'Gestión de equipo audiovisual';
$vista->encabezado = 'Agregar solicitud de equipo';

/* Si queremos mostrar el boton de regresar y otras cosas */
$vista->regresar = 'mod=reservar';
$vista->boton  = 'Agregar solicitud';
$vista->accion = 'agregar';

/* Ponemos la fecha por default que va a aparecer señalada */
if ($dia == 5) {
  $vista->fecha = date('Y-m-d', strtotime('+3 days'));
} else {
  $vista->fecha = date('Y-m-d', strtotime('+2 days'));
}

presentar('reservar_formulario');
?>
