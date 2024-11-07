<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>exercicio 16</title>
</head>

<body>
  <h1>Gerador de QR Code</h1>
  <form action="qrcode.php" method="POST">
    <label for="texto">Insira o texto ou URL para gerar o QR Code:</label>
    <input type="text" id="qr" name="qr" required>
    <button type="submit">Gerar QR Code</button>
  </form>
</body>

</html>