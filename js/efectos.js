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
  var options = {
          dateFormat: 'yy-mm-dd',
            firstDay: 1,
         dayNamesMin: ['D', 'L', 'M', 'Mi', 'J', 'V', 'S'],
          monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                       'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            onSelect: fechaSeleccionada,
    hideIfNoPrevNext: true
  };
  /* Si hay una fecha por default, la seleccionamos */
  var s = new Date();
  var f = $('#fecha').val();
  if (f) {
    options.defaultDate = fechaADate(f);
  }  
  /* Si hay un calendario en la pagina, dependiendo del dia vamos a habilitar
   * las fechas en que puede reservar el equipo */    
  options.minDate = fechaADate($('#fini').val());
  options.maxDate = fechaADate($('#ffin').val());
  $('#date').datepicker(options);
}

function fechaSeleccionada(d) {
  $("#fecha").val(d);
}

function fechaADate(f) {
  var b = new Array();
  var d = new Date();
  b = f.split('-');
  d.setFullYear(b[0]);
  d.setMonth(b[1]-1);
  d.setDate(b[2]);
  return d;
}
