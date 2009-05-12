<?php
revisarNivel('normal');

include_once('m_reservas.php');

/* Si ya tenemos el id por alguna razon, es porque ya mandamos informacion
 * via POST, nos quedamos con esa informacion y no sacamos nada de la base de
 * datos */
if (!isset($vista->id)) {
  /* Obtenemos la informacion de la reserva que vamos a modificar */
  $reserva = trim($_GET['id']);
  $reserva = $reservas->getReserva(getId(), $reserva);

  /* Asignamos los valores de la vista, para que salgan ahi solo para modificar */
  $vista->id = trim($_GET['id']);
  $vista->descripcion = $reserva['descripcion'];
  $vista->hora_inicio = $reserva['hora_prestamo'];
  $vista->hora_final  = $reserva['hora_devolucion'];
  $vista->fecha  = $reserva['fecha_reserva'];
  $vista->local  = $reserva['aula'];
  $vista->canon  = $reserva['canon'];
  $vista->laptop = $reserva['laptop'];

  /* Debemos de regresar las fechas y horas a su formato inicial, para que la 
   * vista no se confunda */
  $vista->hora_inicio = date('G', strtotime($vista->hora_inicio))*60+
    date('i', strtotime($vista->hora_inicio));
  $vista->hora_final = date('G', strtotime($vista->hora_final))*60+
    date('i', strtotime($vista->hora_final));
  $vista->fecha = date('Y-m-d', strtotime($vista->fecha));
}

/* Las variables que vamos a mostrar en la vista */
$vista->titulo = 'Reservaciones';
$vista->encabezado = 'Modificar solicitud de equipo';

/* Si queremos mostrar el boton de regresar y otras cosas*/
$vista->regresar = true;
$vista->boton  = 'Modificar solicitud';
$vista->accion = 'modificar';

presentar('reservar_formulario');
?>
