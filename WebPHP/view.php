<html>
    <head
        <title></title>
        <style type="text/css">
            @import url("css/main.css");
        </style>
    </head>
    <body>
        <?php
include("conexao.php");
include("funcoes.php");

if(isset($_GET["id"])){
    if(is_numeric($_GET["id"])){
        $SQL = "SELECT news.*, autor.nome FROM news INNER JOIN autor on autor.id = news.autor WHERE news.id = ".$_GET["id"];
        $query = mysql_query($SQL);
        $exibir = mysql_fetch_array($query);
        
        if(mysql_num_rows($query) > 0){
            echo "<div id='news' style='background-color:#FFF'>";
            echo "-> <b>".$exibir["titulo"]."</b>";
            echo " - Por <b>".$exibir["nome"]."</b>";
            echo " - postado em: <b>".datetobr($exibir["data"])."</b>";
            echo "<br/>".$exibir["conteudo"]."<br/>";
            echo " - fonte: <b>".$exibir["fonte"]."</b>";;
            echo "</div>";
        } else {
            echo "<b>Erro no sistema, news incorreta!</b>";
        }
    }
}
?>
    </body>
</html>
