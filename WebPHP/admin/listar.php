<?php
    include("../conexao.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style type="text/css">
            @import url("../css/main.css");
        </style>
        <script type="text/javascript">
            function apagar(id, desc){
                if(window.confirm("Deseja realmente apagar este registro: " + desc)){
                    window.location = 'apagar.php?id=' + id;
                }
            }
        </script>
    </head>
    <body>
        <div id="cadastro">
        <fieldset>
        <legend>Listar News</legend>
       
        <ul>
            <?php
                $SQL = "SELECT *, date_format(data, '%d/%m/%Y') as data_pt FROM news";
                
                $query = mysql_query($SQL, $conn);
                while($exibir = mysql_fetch_array($query)){
            ?>
            <li><?php echo $exibir["data_pt"]?> - <?php echo $exibir["titulo"]?> - <a href="editar.php?id=<?php echo $exibir["id"]?>">[Editar]</a>&nbsp;<a href="#" onclick="apagar('<?php echo $exibir["id"]?>', '<?php echo $exibir["titulo"]?>');">[Apagar]</a></li>
            <?php
                }
            ?>
        </ul>
             </fieldset>
            </div>
    </body>
</html>