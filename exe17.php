<?php
$num1 = $_POST['numero1'];
$porc1 = $_POST['porc1'];
$num2 = $_POST['numero2'];
$porc2 =  $_POST['porc2'];
$calc1 =$num1 - $num1 * ($porc1 / 100 );
$calc2 =$num2 - $num2 * ($porc2 / 100 );
$total = $calc1 + $calc2;
echo  "<h3> Calcular Desconto</h3>";
echo"O valor do 1 produto com desconto é: " . $calc1;
echo"<br/> O valor do 2 produto com desconto é: " . $calc2;
echo"<br/> O total dos produtos com desconto é: " . $total;
?>