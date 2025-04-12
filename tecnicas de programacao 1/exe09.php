<?php

$num = $_POST['numero'];

echo "<h3>Gerador de Numero</h3></br></br>";
for ($i = 0; $i <= $num; $i+=2) {
  echo "$i </br>";
}


?>