<?php
session_start();

// Verifica se a sessão já foi iniciada e o número gerado
if (!isset($_SESSION['numero_aleatorio'])) {
  // Gera um número aleatório entre 1 e 100
  $_SESSION['numero_aleatorio'] = rand(1, 100);
}

// Pega o palpite do jogador
$palpite = isset($_POST['palpite']) ? (int)$_POST['palpite'] : null;
$mensagem = '';

if ($palpite) {
  // Verifica se o palpite está correto
  if ($palpite == $_SESSION['numero_aleatorio']) {
    $mensagem = "Parabéns! Você adivinhou o número " . $_SESSION['numero_aleatorio'] . ".";
    // Reinicia o jogo gerando um novo número
    unset($_SESSION['numero_aleatorio']);
  } elseif ($palpite < $_SESSION['numero_aleatorio']) {
    $mensagem = "O número é maior que $palpite.";
  } else {
    $mensagem = "O número é menor que $palpite.";
  }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado do Palpite</title>
</head>

<body>
  <h1>Jogo de Adivinhação</h1>
  <p><?= $mensagem ?></p>
  <form action="adivinhacao.php" method="POST">
    <label for="palpite">Tente novamente:</label>
    <input type="number" name="palpite" id="palpite" min="1" max="100" required>
    <button type="submit">Enviar</button>
    <br><br><a href='index.php'>Voltar</a>
  </form>
</body>

</html>