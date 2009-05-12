<?php
revisarNivel(2);

include_once('m_equipos.php');

/* Eliminamos el equipo */
$equipo = trim($_GET['id']);
$equipos->delEquipo($equipo);

/* Redireccionamos al inicio */
header('Location: index.php?mod=equipo');
?>
