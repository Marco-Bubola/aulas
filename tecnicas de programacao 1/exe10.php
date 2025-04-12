<?php

$num = $_POST['numero'];

echo "<h3>Gerador de Numero</h3></br></br>";

$a = 1;

while ($a <= $num) {
  echo "$a </br>";
  $a+=2;
}
echo "<p>Sequencia encerrada</p>";

?>