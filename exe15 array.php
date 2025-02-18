<?php
$letra = $_POST['letra'];

echo "array trocado: ";

$letras = array("A", "B", "C", "D", "E");

for ($i = 0; $i <= 4; $i++){
  if ($letras[$i] == $letra){
    $letras[$i] = "x";
  }
  echo"<br/>" . $letras[$i];
}
?>