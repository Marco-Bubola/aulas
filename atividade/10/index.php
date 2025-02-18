<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exercicio 10</title>
</head>

<body>
  <h1>Calendário de Eventos</h1>
  <h2>Adicionar Evento</h2>
  <form action="calendario.php" method="post">
    <label for="nome">Nome do Evento:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="data">Data do Evento:</label>
    <input type="date" id="data" name="data" required><br><br>

    <button type="submit" name="adicionar">Adicionar Evento</button>
  </form>

  <h2>Eventos Cadastrados</h2>
  <form action="calendario.php" method="post">
    <button type="submit" name="listar">Listar Eventos</button>
  </form>

  <form action="calendario.php" method="post">
    <button type="submit" name="limpar">Excluir Todos os Eventos</button>
  </form>
</body>

</html>