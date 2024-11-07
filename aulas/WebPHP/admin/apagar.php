<?php
include "../conexao.php";
if(is_numeric($_GET["id"])){
    $SQL = "DELETE FROM news WHERE id = ".$_GET["id"];
    $query = mysql_query($SQL);
    if(mysql_affected_rows($conn) > 0){
        echo "<script>alert('News apagada com sucesso!');</script>";
        echo "<script>window.location = 'listar.php';</script>";
    }
}
?>
