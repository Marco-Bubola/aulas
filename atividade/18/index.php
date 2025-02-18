<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>exercicio 18</title>
</head>

<body>
  <h1>Calculadora de Frete</h1>
  <form action="calcular_frete.php" method="post">
    <label for="peso">Peso do Pacote (kg):</label>
    <input type="number" id="peso" name="peso" step="0.01" required><br><br>

    <label for="destino">Destino:</label>
    <select id="destino" name="destino" required>
      <option value="São Paulo">São Paulo</option>
      <option value="Rio de Janeiro">Rio de Janeiro</option>
      <option value="Belo Horizonte">Belo Horizonte</option>
      <option value="Brasília">Brasília</option>
      <option value="Manaus">Manaus</option>
      <option value="Fortaleza">Fortaleza</option>
      <option value="Salvador">Salvador</option>
      <option value="Recife">Recife</option>
      <option value="Porto Alegre">Porto Alegre</option>
      <option value="Curitiba">Curitiba</option>
    </select><br><br>

    <input type="submit" value="Calcular Frete">
  </form>
</body>

</html>