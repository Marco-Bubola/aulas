<?php
session_start();
require_once 'conexao.php';
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Controle - Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2>Painel de Controle - Administrador</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <a href="lista_clientes.php" class="btn btn-primary btn-lg btn-block">Lista de Clientes</a>
            </div>
            <div class="col-md-6">
                <a href="lista_usuarios.php" class="btn btn-primary btn-lg btn-block">Lista de Usuários</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>