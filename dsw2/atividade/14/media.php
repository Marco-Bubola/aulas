<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <center>
    <?php
    echo "<h1>Calculo de Media</h1>";
    if (isset($_POST['disc1']) . isset($_POST['disc2']) . isset($_POST['disc3'])) {

      $disc1 = floatval($_POST['disc1']);
      $disc2 = floatval($_POST['disc2']);
      $disc3 = floatval($_POST['disc3']);

      $media = ($disc1 + $disc2 + $disc3) / 3;

      echo "<h3>A media das notas é: $media</h3>";
      if ($media >= 6) {
        echo "<P>Aluno aprovado</P>";
      } else {
        echo "<h3>Aluno reprovado</h3>";
      }
    } else {
      echo "<p>Por favor, preencha todos os campos.</p>";
    }
    echo "<br><a href='index.php'>Voltar</a>";
    ?>
  </center>
</body>

</html>