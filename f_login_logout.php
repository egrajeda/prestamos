<?php
$_SESSION = array();
session_destroy();

/* Lo redireccionamos a la pagina inicial */
header('Location: index.php');
?>
