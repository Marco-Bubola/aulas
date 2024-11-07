<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exercicio 15</title>
</head>

<body>
  <h1>Calendário de Contato</h1>
  <h2>Adicionar Contato</h2>
  <form action="contato.php" method="post">
    <label for="nome">Nome do contato:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="contato">Informacao do Contato:</label>
    <input type="text" id="contato" name="contato" required><br><br>

    <button type="submit" name="adicionar">Adicionar Contato</button>
  </form>

  <h2>Contato Cadastrados</h2>
  <form action="contato.php" method="post">
    <button type="submit" name="listar">Listar Contato</button>
  </form>

  <form action="contato.php" method="post">
    <button type="submit" name="limpar">Excluir Todos os Contato</button>
  </form>
</body>

</html>