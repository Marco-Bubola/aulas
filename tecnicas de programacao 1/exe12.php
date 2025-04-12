<?php

$etapas = $_POST['numero'];

echo "<h3>Gerador de Sequência de Fibonacci para $etapas etapas</h3></br></br>";

$a = 0;
$b = 1;
$piso = 1;

echo "$a </br>";
echo "$b </br>";


for ($i = 2; $i <= $etapas; $i++) {
    $next = $a + $b;
    echo "$next </br>";
    $piso = $piso + $next**2;
    $a = $b;
    $b = $next;
}
echo "<P> Para $etapas etapas, necessitamos de $piso pisos</P>"
?>