<?php
$num1 = $_POST['num1'];
$qtd = $_POST['num2'];
$razao = $_POST['num3'];

echo"<h3> Progessao Geometrica</h3>" ;


for ($i = 1; $i <= $qtd; $i++){
 echo "a $i ...." . "$num1<BR/>";
  $calc = $num1 * $razao;
 $num1 = $calc;
  
}
?>