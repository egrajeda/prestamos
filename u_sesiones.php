<?php
session_start();

function getNivel() {
  return @$_SESSION['nivel'];
}

function getId() {
  return $_SESSION['id'];
}

function getModuloInicial() {
  if (@$_SESSION['nivel'] >= 2) {
    return 'administrar';
  }
  if (@$_SESSION['nivel'] == 1) {
    return 'reservar';
  }
  return 'login';
}

function revisarNivel($requerido) {
  $nivel = @$_SESSION['nivel'];
  if ($nivel == 3) {
    if ($requerido == 0) {
      bloquearEntrada();
    }
  } elseif ($nivel != $requerido) {
    bloquearEntrada();
  }
}

function bloquearEntrada() {
  header('Location: index.php?mod=' . getModuloInicial());  
}

?>
