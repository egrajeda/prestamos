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
    var b = new Array();
    b = f.split('-');
    s.setFullYear(b[0]);
    s.setMonth(b[1]-1);
    s.setDate(b[2]);
    options.defaultDate = s;
  }  
  /* Si hay un calendario en la pagina, dependiendo del dia vamos a habilitar
   * las fechas en que puede reservar el equipo */    
  var d = new Date();
  if (d.getDay() == 5) {
    options.minDate = '+3d';
    options.maxDate = '+9d';  
  } else if (d.getDay() == 6) {
    options.minDate = '+2d';
    options.maxDate = '+8d';  
  }  
  $('#date').datepicker(options);
}

function fechaSeleccionada(d) {
  $("#fecha").val(d);
}
