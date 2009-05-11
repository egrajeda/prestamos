<?php
session_start();

function getNivel() {
  return $_SESSION['nivel'];
}

function getModuloInicial() {
  if ($_SESSION['nivel'] == 'administrador') {
    return 'administrar';
  }
  if ($_SESSION['nivel'] == 'normal') {
    return 'reservar';
  }
  return 'login';
}

function revisarNivel($requerido) {
  if ($_SESSION['nivel'] != $requerido) {
    bloquearEntrada();
  }
}

function bloquearEntrada() {
  header('Location: index.php?mod=' . getModuloInicial());  
}

?>
