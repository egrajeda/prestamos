<?php
revisarNivel('normal');

/* Las variables que vamos a mostrar en la vista */
$vista->titulo = 'Reservaciones';
$vista->encabezado = 'Solicitud de recurso audiovisual';

/* Debemos de saber el dia, para asi bloquear las reservas o no */
$vista->dia = date('N');

presentar('reservar');
?>
