<?php
echo " <h3>Verificador de Idade</h3>";
$dataNascimento = $_POST['data_nascimento'];
$dataNascimentoFormatada = new DateTime($dataNascimento);
$dataReferencia = new DateTime('2000-01-01');

if ($dataNascimentoFormatada > $dataReferencia) {
  echo "Menor de idade";
} else {
  echo "Maior de idade";
}
echo "<br><a href='index.php'>Voltar</a>";