<?php
echo "<h1>Validador de CPF</h1>";
function validarCPF($cpf)
{
  $cpf = preg_replace('/[^0-9]/is', '', $cpf);

  if (strlen($cpf) != 11) {
    return false;
  }


  if (preg_match('/(\d)\1{10}/', $cpf)) {
    return false;
  }

  for ($t = 9; $t < 11; $t++) {
    for ($d = 0, $c = 0; $c < $t; $c++) {
      $d += $cpf[$c] * (($t + 1) - $c);
    }
    $d = ((10 * $d) % 11) % 10;

    if ($cpf[$c] != $d) {
      return false;
    }
  }

  return true;
}

$cpf = $_POST['cpf'];
if (validarCPF($cpf)) {
  echo "<h3>O CPF $cpf é válido.</h3>";
} else {
  echo "<h3>O CPF $cpf é inválido.</h3>";
}
echo "<br><a href='index.php'>Voltar</a>";