<?php
revisarNivel(2);

/* Las variables que vamos a mostrar en la vista */
$vista->titulo     = 'Gestión de equipo audiovisual';
$vista->encabezado = 'Agregar usuario';

/* Si queremos mostrar el boton de regresar */
$vista->regresar = 'mod=administrar';

presentar('usuario_formulario');
?>
