<?php
echo "<h3>Conversor de Dolar em Reais</h3>";
$dolar = $_POST['dolar'];
echo "Dolar: ";
echo "R$" . number_format($dolar, 2, ',', '.') . "</br>";

$dolar = $dolar * 5;

echo "O valor em Reais  é: ";
echo "R$" . number_format($dolar, 2, ',', '.') . "</br>";
echo "<br><a href='index.php'>Voltar</a>";