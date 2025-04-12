<?php
session_start(); // Iniciar a sessão

// Verifique se o nível de acesso está definido na sessão
if (!isset($_SESSION['nivel_acesso'])) {
  header('Location: login.php'); // Se não estiver autenticado, redirecionar para o login
  exit;
}

// Defina a variável de nível de acesso
$nivel_acesso = $_SESSION['nivel_acesso'];

// Redirecionar com base no nível de acesso
if ($nivel_acesso == 'ADMINISTRADOR') {
  header('Location: admin_dashboard.php'); // Redireciona para o dashboard do administrador
  exit; // Importante: saia após redirecionar
} elseif ($nivel_acesso == 'COMUM') {
  header('Location: comun_dashboard.php'); // Redireciona para a lista de clientes
  exit; // Importante: saia após redirecionar
} else {
  header('Location: index.php'); // Redireciona para a página padrão se o nível de acesso não for válido
  exit;
}