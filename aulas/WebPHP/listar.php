<?php
    include("conexao.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style type="text/css">
            @import url("css/main.css");
        </style>
        
        <script type="text/javascript">
            function verificaCombo(id){
                if(document.getElementById(id).value == "0"){
                    document.getElementById("btnFiltar").disabled = true;
                } else {
                    document.getElementById("btnFiltar").disabled = false;
                }
            }
    </script>
    </head>
    <body>
        <div id="cadastro">
        <fieldset>
        <legend>Listar News</legend>
        
        <form method="GET" action="listar.php">
             <b>By Autor:</b>
             <select name="cbAutores" id="cbAutores" onchange="verificaCombo(this.id);">
                 <option value="0">-- Selecione --</option>
                 <?php
                 
                 if(isset($_GET["cbAutores"])){
                     $idAutor = $_GET["cbAutores"];
                 } else {
                     $idAutor = "0";
                 }
                 
                 $SQL = "SELECT * FROM autor ORDER BY nome ASC";
                 
                   $query = mysql_query($SQL, $conn);
                    while($exibir = mysql_fetch_array($query)){
                ?>
                    <option value="<?php echo $exibir["id"];?>" <?php echo ($exibir["id"] == $idAutor) ? "selected='selected'" : "" ?>><?php echo $exibir["nome"];?></option>
                    <?php }?>
            </select>
             <input type="submit" value="Filtar" disabled="disabled" id="btnFiltar"/>
        </form>
        <ul>
            <?php
                $SQL = "SELECT news.*, autor.nome, date_format(news.data, '%d/%m/%Y') as data_pt FROM news INNER JOIN autor on autor.id = news.autor";
               
                if(isset($_GET["cbAutores"])){
                     if(is_numeric($_GET["cbAutores"])){
                         $SQL .= " WHERE autor = ".$_GET["cbAutores"];
               
                     }
                 }
                
                $query = mysql_query($SQL, $conn);
                
                if(mysql_num_rows($query) <= 0){
                    echo "<div id='news' style='background-color:#FFF'>Não existe nenhuma news!</div>";
                }
                while($exibir = mysql_fetch_array($query)){
            ?>
                <li><?php echo $exibir["data_pt"]?> - <?php echo $exibir["titulo"]?> - Por <b><?php echo $exibir["nome"]?></b> - <a href="view.php?id=<?php echo $exibir["id"]?>">[Veja +]</a></li>
            <?php
                }
            ?>
        </ul>
        <?php
                $query = mysql_query("CALL getTotalNews(@total)");
                $query = mysql_query("SELECT @total");
                $exibir = mysql_fetch_array($query);
                echo "Total de news: ".$exibir[0];
            ?>
             </fieldset>
            
            </div>
    </body>
</html>