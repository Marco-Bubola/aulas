<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simulador de Emprestimo</title>
  <style>
  /* Reseta alguns estilos padrão para garantir consistência */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
  }

  /* Estiliza o body e alinha o conteúdo centralizado na tela */
  body {
    background-color: #f4f4f4;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 20px;
  }

  /* Estiliza o container principal */
  div {
    background-color: #fff;
    padding: 5vw 5vh;
    /* Padding proporcional ao viewport */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    max-width: 40vw;
    /* Ajusta o máximo de largura para 40% da viewport */
    width: 100%;
    text-align: center;
    min-width: 320px;
    /* Garante uma largura mínima */
  }

  /* Estiliza os títulos */
  h2 {
    color: #007BFF;
    margin-bottom: 2vh;
  }

  h3 {
    margin-bottom: 3vh;
    font-weight: 300;
    color: #555;
  }

  /* Estiliza os parágrafos */
  p {
    font-size: 1.2rem;
    margin-bottom: 1.5vh;
    color: #333;
  }

  /* Adaptação para dispositivos móveis */
  @media (max-width: 768px) {
    div {
      padding: 5vw;
      max-width: 80vw;
    }
  }
  </style>
</head>

<body>
  <div>

    <?php
    $cliente = $_POST['cliente'];
    $valor = $_POST['valor'];
    $score = $_POST['score'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $parcela = $_POST['parcela'];
    //  $seguro = $_POST['seguro'];
    if (isset($_POST['seguro'])) {
      $seguro = 49.90;
    } else {
      $seguro = 0;
    }
    if ($cliente == "s") {
      $juros = 0.03;
      $valor = $valor + $valor * ($juros * $parcela) + $seguro;
      $valor_total = $valor + $valor * 0.00318;
      $valor_parcela = $valor_total / $parcela;
    } else {
      switch ($score) {
        case $score <= 299:
          echo "299";
          $juros = 0.2;
          break;
        case $score <= 399:
          echo "299";
          $juros = 0.2;
          break;
        case $score <= 499:
          echo "299";
          $juros = 0.2;
          break;
        case $score <= 699:
          echo "299";
          $juros = 0.2;
          break;
        default:
          $juros = 0.5;
          break;
      }
      $valor = ($valor + $valor * $juros * $parcela) + $seguro + 35;
      $valor_total = $valor + $valor * 0.00318;
      $valor_parcela = $valor_total / $parcela;
    }

    ?>
    <h2>Seja bem vindo ao Mybank <?php echo $nome ?></h2>
    <h3>Simulador de Emprestimo</h3>
    <p>Valor das parcela: R$<?php echo number_format($valor_parcela, 2, ",", ".") ?></p>
    <p>Quantidade de Parcela: <?php echo $parcela ?></p>
    <p>Quantidade de Juros: <?php echo $juros * 100 ?>%</p>
    <p>Valor total CET: R$<?php echo number_format($valor_total, 2, ",", ".") ?></p>

  </div>
</body>

</html>