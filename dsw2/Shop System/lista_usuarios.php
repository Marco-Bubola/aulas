<?php

session_start();
include 'conexao.php';
include 'menu.php';

$usuarios = $conn->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);

// $clientes está recebendo todos os clientes - SELECT * FROM clientes
// Query é uma consulta
// fetchAll pega tudo e transforma num objeto
// PDO :: significa que está indo lá dentro do Banco de Dados

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <h1 class="mt-4">Lista de usuarios</h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Email</th>
          <th>Nivel de Acesso</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $usuarios): ?>
          <tr>
            <td><?= htmlspecialchars($usuarios['nome']) ?></td>
            <td><?= htmlspecialchars($usuarios['email']) ?></td>
            <td><?= htmlspecialchars($usuarios['nivel_acesso']) ?></td>
            <td>
              <?php if ($_SESSION['nivel_acesso'] == 'ADMINISTRADOR'): ?>

                <a href="editar_usuarios.php?id=<?= $usuarios['id'] ?>" class="btn btn-warning">Editar</a>
                <a href="excluir_usuarios.php?id=<?= $usuarios['id'] ?>" class="btn btn-danger"
                  onclick="return confirm('A exclusão será permanente! Tem certeza disso?')">Excluir</a>
              <?php else: ?>
                <span class="text-muted">Sem permissão</span>
              <?php endif; ?>
            </td>
          </tr>

          <!-- A estrutura da tabela é criada utilizando a tag <table>, que define uma tabela HTML. -->
          <!-- A tag <thead> é usada para definir o cabeçalho da tabela. -->
          <!--  <tr> (table row) define uma linha. -->
          <!--  <th> (table header) define uma célula de cabeçalho que contém o título de cada coluna. -->
          <!--  Dentro de <tbody>, o loop foreach percorre cada cliente no array $clientes e cria uma nova linha da tabela usando <tr>. Cada linha exibe os dados do cliente nas células definidas por <td>. -->
          <!--  A tag <td> (table data) é usada para definir as células de dados que contêm o nome, email, e o link para o PDF do cliente, além de botões de ação para editar e excluir. -->

        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

</body>

</html>