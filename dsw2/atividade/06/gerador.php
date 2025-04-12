<?php
echo "  <h1>Gerador de Senhas Aleatórias</h1>";
$tamanho = $_POST['tamanho'];
$incluir_numeros = isset($_POST['incluir_numeros']);
$incluir_especiais = isset($_POST['incluir_especiais']);

$caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';


if ($incluir_numeros) {
  $caracteres .= '0123456789';
}


if ($incluir_especiais) {
  $caracteres .= '!@#$%^&*()-_=+[]{}<>?';
}


$senha_gerada = '';
$comprimentoCaracteres = strlen($caracteres);
for ($i = 0; $i < $tamanho; $i++) {
  $senha_gerada .= $caracteres[rand(0, $comprimentoCaracteres - 1)];
}

echo "Senha gerada: $senha_gerada";
echo "<br><a href='index.php'>Voltar</a>";