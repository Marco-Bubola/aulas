<?php
session_start();
include 'conexao.php';
include 'menu.php';

$id = $_GET['id'];
$produtos = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
$produtos->execute([$id]);
$produtos = $produtos->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];
  $quantidade = $_POST['quantidade'];
  $nomeImagem = $_FILES['imagem'];

  // Variável para a nova imagem
  $novoNomeImagem = null;

  if ($nomeImagem['error'] === UPLOAD_ERR_OK) {
    $novoNomeImagem = uniqid() . "-" . $nomeImagem['name'];
    move_uploaded_file($nomeImagem['tmp_name'], "uploads/$novoNomeImagem");

    // Remove o arquivo antigo
    if (file_exists("uploads/" . $produtos['imagem'])) {
      unlink("uploads/" . $produtos['imagem']);
    }
  } else {
    // Caso a imagem não tenha sido enviada, mantemos o nome da imagem antiga
    $novoNomeImagem = $produtos['imagem'];
  }

  // Atualiza o produto no banco de dados
  $stmt = $conn->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, quantidade = ?, imagem = ? WHERE id = ?");
  $stmt->execute([$nome, $descricao, $preco, $quantidade, $novoNomeImagem, $id]);

  header("Location: lista_produtos.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Produto</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1 class="mt-4">Editar Produto</h1>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nome">Nome do produto: </label>
        <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($produtos['nome']) ?>" required>
      </div>
      <div class="form-group">
        <label for="descricao">Descrição: </label>
        <input type="text" class="form-control" name="descricao" value="<?= htmlspecialchars($produtos['descricao']) ?>"
          required>
      </div>
      <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" class="form-control" name="preco" step="0.01"
          value="<?= htmlspecialchars($produtos['preco']) ?>" required>
      </div>
      <div class="form-group">
        <label for="quantidade">Quantidade: </label>
        <input type="number" class="form-control" name="quantidade"
          value="<?= htmlspecialchars($produtos['quantidade']) ?>" required>
      </div>
      <div class="form-group">
        <label for="imagem">Imagem: </label>
        <input type="file" class="form-control" name="imagem" accept=".png, .jpg, .jpeg, .gif">
      </div>
      <button type="submit" class="btn btn-primary">Editar</button>
    </form>
  </div>
</body>

</html>