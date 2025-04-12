<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>exercicio 19</title>
</head>

<body>
  <h1>Calculadora de Frete</h1>
  <form action="calculadora.php" method="post">
    <label for="velo">Digite a Velocidade media: </label>
    <input type="number" id="velo" name="velo" required><br><br>
    <label for="distancia">Digite a distancia de viagem: </label>
    <input type="number" id="distancia" name="distancia" required><br><br>

    <input type="submit" value="Calcular o tempo de viagem">
  </form>
</body>

</html>