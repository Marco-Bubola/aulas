<?php
include "../conexao.php";
if(isset($_GET["nome"])){
    $SQL = "INSERT INTO autor (nome) VALUES('".$_GET["nome"]."')";
    $executa = mysql_query($SQL);
    
    $id = mysql_insert_id($conn);
    
    if(mysql_affected_rows($conn) > 0){
        echo $id;
    } else {
        echo "N";
    }
}
?>
