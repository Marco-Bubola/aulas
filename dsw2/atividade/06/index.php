<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exercicio 06</title>
</head>

<body>
  <h1>Gerador de Senhas Aleatórias</h1>

  <form action="gerador.php" method="POST">
    <label for="tamanho">Comprimento da senha:</label>
    <input type="number" id="tamanho" name="tamanho" min="4" max="20" required><br><br>

    <label for="incluir_numeros">Incluir números?</label>
    <input type="checkbox" id="incluir_numeros" name="incluir_numeros"><br><br>

    <label for="incluir_especiais">Incluir caracteres especiais?</label>
    <input type="checkbox" id="incluir_especiais" name="incluir_especiais"><br><br>

    <button type="submit">Gerar Senha</button>
  </form>
</body>

</html>