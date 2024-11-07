<?php

session_start();
include 'conexao.php';
include 'menu.php';

$produtos = $conn->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de produtos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <h1 class="mt-4">Lista de produtos</h1>
    <a href="cadastrar_produto.php" class="btn btn-success mb-3">Cadastrar produtos</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Produto</th>
          <th>Descricao</th>
          <th>Preço</th>
          <th>Quantidade</th>
          <th>Imagem</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($produtos as $produtos): ?>
        <tr>
          <td><?= htmlspecialchars($produtos['nome']) ?></td>
          <td><?= htmlspecialchars($produtos['descricao']) ?></td>
          <td><?= htmlspecialchars($produtos['preco']) ?></td>
          <td><?= htmlspecialchars($produtos['quantidade']) ?></td>
          <td><a href="uploads/<?= htmlspecialchars($produtos['imagem']) ?>" target="_blank">Ver Imagem</a></td>
          <td>
            <?php if ($_SESSION['nivel_acesso'] == 'ADMINISTRADOR'): ?>

            <a href="editar_produtos.php?id=<?= $produtos['id'] ?>" class="btn btn-warning">Editar</a>
            <a href="excluir_produtos.php?id=<?= $produtos['id'] ?>" class="btn btn-danger"
              onclick="return confirm('A exclusão será permanente! Tem certeza disso?')">Excluir</a>
            <?php else: ?>
            <span class="text-muted">Sem permissão</span>
            <?php endif; ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

</body>

</html>