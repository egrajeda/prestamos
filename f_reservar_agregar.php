<?php
revisarNivel('normal');

/* Como una seguridad extra, se revisa que en verdad sea viernes o sábado */
$dia = date('N');
if ($dia != 5 && $dia != 1) {
  bloquearEntrada();
}

/* Las variables que vamos a mostrar en la vista */
$vista->titulo = 'Reservaciones';
$vista->encabezado = 'Agregar solicitud de equipo';

/* Si queremos mostrar el boton de regresar */
$vista->regresar = true;

presentar('reservar_agregar');
?>