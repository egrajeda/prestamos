<?php
revisarNivel('normal');

/* Las variables que vamos a mostrar en la vista */
$vista->titulo = 'Reservaciones';
$vista->encabezado = 'Reservación de equipo';

/* Debemos de saber el dia, para asi bloquear las reservas o no */
$vista->dia = date('l');

/* Lo primero que hacemos es dejar al usuario iniciar sesion */
presentar('reservar');
?>
