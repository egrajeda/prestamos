<?php
revisarNivel('normal');

include_once('m_reservas.php');

/* Obtenemos la informacion de la reserva que vamos a modificar */
$reserva = trim($_GET['id']);
$reserva = $reservas->getReserva(getId(), $reserva);

/* Asignamos los valores de la vista, para que salgan ahi solo para modificar */
$vista->descripcion = $reserva['descripcion'];
$vista->hora_inicio = $reserva['hora_prestamo'];
$vista->hora_final  = $reserva['hora_devolucion'];
$vista->fecha  = $reserva['fecha_reserva'];
$vista->local  = $reserva['aula'];
$vista->canon  = $reserva['canon'];
$vista->laptop = $reserva['laptop'];

/* Las variables que vamos a mostrar en la vista */
$vista->titulo = 'Reservaciones';
$vista->encabezado = 'Modificar solicitud de equipo';

/* Si queremos mostrar el boton de regresar */
$vista->regresar = true;

presentar('reservar_formulario');
?>
