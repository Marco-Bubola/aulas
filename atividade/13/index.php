<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exercicio 13</title>
</head>

<body>
  <h1>Jogo de Adivinhação</h1>
  <p>Adivinhe o número que o computador escolheu entre 1 e 100.</p>

  <form action="adivinhacao.php" method="POST">
    <label for="palpite">Seu palpite:</label>
    <input type="number" name="palpite" id="palpite" min="1" max="100" required>
    <button type="submit">Enviar</button>
  </form>
</body>

</html>