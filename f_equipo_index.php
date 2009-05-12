<?php
revisarNivel(2);

include_once('m_equipos.php');

/* Las variables que vamos a mostrar en la vista */
$vista->titulo     = 'Gestión de equipo audiovisual';
$vista->encabezado = 'Equipo audiovisuales';
$vista->equipos    = $equipos->getEquipos();

presentar('equipo');
?>
