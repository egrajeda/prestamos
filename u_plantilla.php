<?php
/**
 * Estas son una serie de funciones auxiliares para manejar las 'plantillas'
 * que vamos a utilizar, que al final solo son archivos PHP.
 *
 * Más que todo, estas funciones se encargan de insertar las plantillas en 
 * orden.
 */
 
/* En este objeto vamos a ir agregando las variables que deseemos usar en la
 * vista, por ej:
 *   $vista->titulo = 'Reservaciones';
 *   $vista->encabezado = 'Iniciar sesión';
 */
$vista = new stdClass();

/* Carga el template y lo muestra */
function presentar($tpl) {
  global $vista;
  include_once('tpl/encabezado.php');
  include_once("tpl/$tpl.php");
  include_once('tpl/piedepagina.php');
} 
