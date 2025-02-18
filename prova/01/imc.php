<?php
echo "<h1>Cacular IMC</h1>";
$peso = $_POST['peso'];
$altura = $_POST['altura'];

$imc = $peso / ($altura * $altura);
$imc = round($imc, 2);
echo "<h3>Seu peso é: $peso</h3>";
echo "<h3>Sua altura é: $altura</h3>";
echo "<h3>Seu IMC é: $imc</h3>";

if ($imc < 18.5) {
  echo "<h4>Você está abaixo do peso ideal</h4>";
} else if ($imc > 18.6 && $imc < 24.9) {
  echo "<h4>Peso ideal (parabens)</h4>";
} else if ($imc > 25 && $imc < 29.9) {
  echo "<h4>Levemente acima do peso</h4>";
} else if ($imc > 30 && $imc < 34.9) {
  echo "<h4>Obesidade grau I</h4>";
} else if ($imc > 35 && $imc < 39.9) {
  echo "<h4>Obesidade grau II (severa)</h4>";
} else {
  echo "<h4>Obesidade grau III (mórbida)</h4>";  //obesidade grau III (mórbida)
}



echo "<br><a href='index.php'>Voltar</a>";
