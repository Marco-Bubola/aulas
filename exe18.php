<?php
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$sexo = $_POST['sexo'];

echo "<h3>Resultado</h3>";
if ($sexo == "m" ){
  if ($idade >= 18){
    echo $nome . ", voce deve fazer o alistamento militar";
    
    }else if ($idade < 18){
    echo $nome . ", voce so pode se alistar quando completar 18";
    } 
}

else if ($sexo = "f"){
  echo $nome . ", voce nao pode se alistar";
}
?>