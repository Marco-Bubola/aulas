<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exercicio 12</title>
</head>

<body>
  <h1>Busca de Endereço por CEP</h1>
  <h2>Consultar Endereço</h2>
  <form action="busca_cep.php" method="post">
    <label for="nome">Digite seu nome completo:</label>
    <input type="text" id="nome" name="nome" required><br><br>
    <label for="email">Digite seu email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="senha">Digite sua Senha:</label>
    <input type="password" id="senha" name="senha" required><br><br>
    <label for="cep">Digite o CEP:</label>
    <input type="text" id="cep" name="cep" required pattern="\d{5}-?\d{3}" placeholder="12345-678">
    <br><br>
    <button type="submit">Buscar Endereço</button>
  </form>
</body>

</html>