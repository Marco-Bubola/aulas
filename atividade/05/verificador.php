<?php
echo " <h2>Verificador de Palíndromos</h2>";
$palavra = $_POST['palavra'];

$palavraInvertida = strrev($palavra);

if ($palavra == $palavraInvertida) {
  echo "A palavra '$palavra' é um palíndromo.";
} else {
  echo "A palavra '$palavra' não é um palíndromo.";
}
echo "<br><a href='index.php'>Voltar</a>";