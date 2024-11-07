<?php
echo "  <h1>Contador de palavras</h1>";
$texto = $_POST['texto'];
$palavras = explode(" ", $texto);
$contador_palavras = 0;

for ($i = 0; $i < count($palavras); $i++) {
  if ($palavras[$i] != "") {
    $contador_palavras++;
  }
}
echo "<h2>O texto contém $contador_palavras palavras.</h2>";
echo "<br><a href='index.php'>Voltar</a>";