<?php
echo "<h1>Cacular IMC</h1>";
$peso = $_POST['peso'];
$altura = $_POST['altura'];

$imc = $peso / ($altura * $altura);
$imc = round($imc, 2);


echo "<h3>Seu IMC é: $imc</h3>";
echo "<br><a href='index.php'>Voltar</a>";