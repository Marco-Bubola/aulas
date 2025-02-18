<?php
$num1 = $_POST['numero1'];
$num2 = $_POST['numero2'];

echo  "<h3> Geracao de numeros sequencias</h3>";


for ($i = $num1; $i <= $num2; $i++){
  
  echo"<br/>" . $i;
}
?>