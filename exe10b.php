<?php

$num = $_POST['numero'];

echo "<h3>Gerador de Sequência de Fibonacci</h3></br></br>";

$a = 0;
$b = 1;

echo "$a </br>";
echo "$b </br>";


for ($i = 2; $i <= $num; $i++) {
    $next = $a + $b;
    echo "$next </br>";
    $a = $b;
    $b = $next;
}

?>