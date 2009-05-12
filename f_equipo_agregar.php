<?php
revisarNivel(2);

/* Las variables que vamos a mostrar en la vista */
$vista->titulo     = 'Gestión de equipo audiovisual';
$vista->encabezado = 'Agregar equipo';

/* Si queremos mostrar el boton de regresar */
$vista->regresar = 'mod=equipo';

presentar('equipo_formulario');
?>
