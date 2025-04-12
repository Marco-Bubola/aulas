<?php
include 'conexao.php';
include 'menu_inicial.php';

$clientes = $conn->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Clientes</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Estilos personalizados para o header e descritivo */
    header {
      background-color: #007bff;
      color: white;
      padding: 20px 0;
      text-align: center;
    }

    .descritivo {
      margin-top: 20px;
      text-align: center;
    }

    .btn-primary {
      margin-top: 15px;
    }

    .welcome {
      margin-top: 20px;
      text-align: center;
    }
  </style>
</head>

<body>

  <!-- Header representando a aplicação -->

  <!-- Descritivo promocional -->
  <section class="descritivo container">
    <h2>O melhor sistema para gerenciar suas vendas e clientes</h2>
    <p>Com o <strong>Shop System</strong>, você pode gerenciar seus clientes, produtos e pedidos de forma simples e
      eficiente. Cadastre-se agora e comece a explorar todas as funcionalidades que tornarão a administração do seu
      negócio mais fácil e organizada.</p>

  </section>

  <!-- Bem-vindo e Login -->
  <div class="welcome container">
    <h2>Bem vindo, Visitante!</h2>
    <p><a href="login.php" class="btn btn-primary">Logar</a> <a href="cadastro_usuario.php"
        class="btn btn-primary">Criar Conta</a></p>
  </div>

</body>

</html>