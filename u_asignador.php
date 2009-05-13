<?php
/**
 * Esta es una clase de ayuda que sirve como pega entre todos los archivos que
 * existen. Se encarga de incluir al archivo que debe de incluirse dependiendo
 * del valor de la variable $_GET['act'].
 *
 * Despues de esto, se encarga de incluir a un archivo para manejar los datos
 * de tipo $_POST, si es que hay, y si no incluye el archivo de presentacion.
 */
include_once('u_plantilla.php');
 
function asignar($modulo, $accion) {
  global $vista;
  /* La accion por default, por si no esta definida es llamada 'index' */
  if ($accion == '') {
    $accion = 'index';
  }    
  /* Si se ha enviado información a través de un formulario, mostramos
     la versión 'backend', que esta antepuesta por una 'b' */     
  if (isset($_POST['backend'])) {
    include_once("b_{$modulo}_{$accion}.php");
  }
  include_once("f_{$modulo}_{$accion}.php");    
}


?>
