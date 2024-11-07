<?php
session_start();
include 'conexao.php';
include 'menu.php';

$id = $_GET['id'];
$usuarios = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
// prepare está preparando algo que será usado posteriormente

$usuarios->execute([$id]);
$usuarios = $usuarios->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $nivel_acesso = $_POST['nivel_acesso'];

    $stmt = $conn->prepare("UPDATE usuarios SET nome = ?, email = ?, nivel_acesso = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $nivel_acesso, $id]);


    header("Location: lista_usuarios.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Cliente</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1 class="mt-4">Editar Cliente</h1>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($usuarios['nome']) ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($usuarios['email']) ?>"
          required>
      </div>
      <div class="form-group">
        <label for="nivel_acesso">Nivel de Acesso</label>
        <input type="text" class="form-control" name="nivel_acesso"
          value="<?= htmlspecialchars($usuarios['nivel_acesso']) ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
  </div>

</body>

</html>