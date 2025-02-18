<?php
echo "<h1>Cacular a temperatura em ºF</h1>";
$c = $_POST['c'];

$f = 1.8 * $c + 32;

echo "<h3>A temperatura em ºF é: $f</h3>";
echo "<br><a href='index.php'>Voltar</a>";
