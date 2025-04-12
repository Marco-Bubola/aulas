<?php
session_start();
include 'conexao.php';
include 'menu.php';

$id = $_GET['id'];
$cliente = $conn->prepare("SELECT * FROM clientes WHERE id = ?");
$cliente->execute([$id]);
$cliente = $cliente->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $arquivoNovo = $_FILES['pdf'];

    if ($arquivoNovo['error'] === UPLOAD_ERR_OK) {
        $nomeArquivoNovo = uniqid() . "-" . $arquivoNovo['name'];
        move_uploaded_file($arquivoNovo['tmp_name'], "uploads/$nomeArquivoNovo");

        // Remove o arquivo antigo
        if (file_exists("uploads/" . $cliente['pdf'])) {
            unlink("uploads/" . $cliente['pdf']);
        }

        $stmt = $conn->prepare("UPDATE clientes SET nome = ?, email = ?, pdf = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $nomeArquivoNovo, $id]);
    } else {
        $stmt = $conn->prepare("UPDATE clientes SET nome = ?, email = ? WHERE id = ?");
        $stmt->execute([$nome, $email, $id]);
    }

    header("Location: lista_clientes.php");
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
        <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($cliente['email']) ?>"
          required>
      </div>
      <div class="form-group">
        <label for="pdf">Arquido PDF Assinado (deixe em branco se não quiser alterar)</label>
        <input type="file" class="form-control" name="pdf" accept=".pdf">
      </div>
      <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
  </div>

</body>

</html>