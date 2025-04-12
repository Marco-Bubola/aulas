<?php
echo " <h3> Calculadora de gorgeta</h3>";
$num = $_POST['numero'];
$porcentagem_gorjeta = $_POST['porcentagem_gorjeta'];
$gorjeta = $num * ($porcentagem_gorjeta / 100);

echo "<h3>Valor da gorjeta</h3>";
echo "R$ " . number_format($gorjeta, 2, ',', '.') . "</br>";
echo "<br><a href='index.php'>Voltar</a>";