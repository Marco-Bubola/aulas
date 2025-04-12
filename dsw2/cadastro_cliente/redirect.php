<?php
session_start();


if (!isset($_SESSION['nivel_acesso'])) {
  header('Location: login.php');
  exit;
}


$nivel_acesso = $_SESSION['nivel_acesso'];


if ($nivel_acesso == 'ADMINISTRADOR') {
  header('Location: admin_dashboard.php');
  exit;
} elseif ($nivel_acesso == 'COMUM') {
  header('Location: lista_clientes.php');
  exit;
  header('Location: index.php');
  exit;
}