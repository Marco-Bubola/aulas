<?php
session_start();
include 'conexao.php';
include 'menu.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $quantidade = $_POST['quantidade'];
  $imagem = $_FILES['imagem'];

  if ($imagem['error'] === UPLOAD_ERR_OK) {
    $nomeImagem = uniqid() . "-" . $imagem['name'];
    move_uploaded_file($imagem['tmp_name'], "uploads/$nomeImagem");

    $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, quantidade, imagem) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $descricao, $preco, $quantidade, $nomeImagem]);
    header("Location: lista_produtos.php");
    exit;
  } else {

    echo "<div class='alert alert-danger'>Erro no upload da imagem.</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Produto</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1 class="mt-4">Cadastrar Produto</h1>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nome">Nome do produto: </label>
        <input type="text" class="form-control" name="nome" required>
      </div>
      <div class="form-group">
        <label for="descricao">Descrição: </label>
        <input type="text" class="form-control" name="descricao" required>
      </div>
      <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" class="form-control" name="preco" step="0.01" required>
      </div>
      <div class="form-group">
        <label for="quantidade">Quantidade: </label>
        <input type="number" class="form-control" name="quantidade" required>
      </div>
      <div class="form-group">
        <label for="imagem">Imagem: </label>
        <input type="file" class="form-control" name="imagem" accept=".png, .jpg, .jpeg, .gif" required>
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
  </div>
</body>

</html>