<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>exercicio 20</title>
</head>

<body>
  <h1>Sistema de Controle de Finanças Pessoais</h1>
  <form action="registrar.php" method="post">
    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo" required>
      <option value="receita">Receita</option>
      <option value="despesa">Despesa</option>
    </select><br><br>

    <label for="categoria">Categoria:</label>
    <input type="text" id="categoria" name="categoria" required><br><br>

    <label for="valor">Valor (R$):</label>
    <input type="number" id="valor" name="valor" step="0.01" required><br><br>

    <input type="submit" value="Registrar">
  </form>

  <h2>Relatório de Finanças</h2>
  <a href="relatorio.php">Ver Relatório</a>
</body>

</html>