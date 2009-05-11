$(document).ready(function() {
  $('.input').focus(function() {
    $(this).addClass('input-highlight');
  });
  $('.input').blur(function() {
    $(this).removeClass('input-highlight');
  });
  /* Insertamos el calendario, si es necesario */
  insertarCalendario();  
});

function insertarCalendario() {
  /* Los nombres de los dias y meses en español */
  var meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
               'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
  var dias = ['L', 'M', 'Mi', 'J', 'V', 'S', 'D'];  
  /* Si hay un calendario en la pagina, dependiendo del dia vamos a habilitar
   * las fechas en que puede reservar el equipo */    
  var d = new Date();
  if (d.getDay() == 5) {
    $('#date').datepicker({ minDate: '+2d', maxDate: '+8d',
      dayNamesMin: dias, monthNames: meses, onSelect: fechaSeleccionada });
  } else if (d.getDay() == 1) {
    $('#date').datepicker({ minDate: '+0d', maxDate: '+6d',
      dayNamesMin: dias, monthNames: meses, onSelect: fechaSeleccionada });
  }  
}

function fechaSeleccionada(d) {
  $("#fecha").val(d);
}
