<?php
include("../conexao.php");
include("../funcoes.php");

if(isset($_POST["txtTitulo"])){
    $titulo = $_POST["txtTitulo"];
    $fonte = $_POST["txtFonte"];
    $data = datetoen($_POST["txtData"]);
    $autor = $_POST["cbAutores"];
    $conteudo = $_POST["txtConteudo"];
    
    if( ($titulo == "") || ($fonte == "") || ($data == "") || ($autor == "0") || ($conteudo == "") ){
        echo "Preencha as informações corretamente.";
        exit;
    } else {
        $SQL = "UPDATE news SET titulo = '".$titulo."', fonte = '".$fonte."', data = '".$data."'";
        $SQL .= ", autor = '".$autor."', conteudo = '".$conteudo."' WHERE id = ".$_GET["id"];
        
        $query = mysql_query($SQL);
        
        if(mysql_affected_rows($conn) > 0){
            echo "<script>alert('News atualizado com sucesso.');</script>";
            echo "<script>window.location = 'listar.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar a news.');</script>";
            echo "<script>window.location = 'listar.php';</script>";
        }
    }
}
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
            function validar(){
                var msg = "---------------- Erro ---------------\nPreencha os seguintes campos:\n------------------------------------\n";
                if(document.getElementById("titulo").value.length <= 0){
                    msg += "Preencha o campo título.\n";
                }
                
                if(document.getElementById("fonte").value.length <= 0){
                    msg += "Preencha o campo Fonte.\n";
                }
                
                if(document.getElementById("cbAutores").value == "0"){
                    msg += "Selecione um autor.\n";
                }
                
                if(document.getElementById("conteudo").value.length <= 0){
                    msg += "Preencha o campo Conteúdo.\n";
                }
                
                if(msg != "---------------- Erro ---------------\nPreencha os seguintes campos:\n------------------------------------\n"){
                    alert(msg);
                    return false;
                }
            }
            
            function mask_date(field){
                if(document.getElementById(field).value.length == 2){
                    document.getElementById(field).value = document.getElementById(field).value + "/";
                }
                
                if(document.getElementById(field).value.length == 5){
                    document.getElementById(field).value = document.getElementById(field).value + "/";
                }
            }
            
            function insertFormatURL(field){
                var new_value = document.getElementById(field).value.replace("http://www.", "");
                document.getElementById(field).value = new_value;
                if(document.getElementById(field).value.length > 0){
                    document.getElementById(field).value = "http://www." + document.getElementById(field).value;
                }
            }
        </script>
    </head>
    <body>
        <?php
        // Busca dados e atribui ao formulário
    if(isset($_GET["id"])){
        if(is_numeric($_GET["id"])){
            $SQL = "SELECT * FROM news WHERE id = ".$_GET["id"];
            $executa = mysql_query($SQL);
            $resultado = mysql_fetch_array($executa);
    
?>
        <div id="cadastro">
        <fieldset>
        <legend>Cadastro News</legend>
        <form name="frm_cadastro" method="POST" action="editar.php?id=<?php echo $_GET["id"];?>" onsubmit="return validar();">
           
            <label for="titulo">Título: </label>
            <br/>
            <input type="text" name="txtTitulo" id="titulo" size="80" value="<?php echo $resultado["titulo"];?>"/>
            <br/> 
            <label for="fonte">Fonte: </label>
            <br/>
            <input type="text" name="txtFonte" id="fonte" size="80" value="<?php echo $resultado["fonte"];?>"/>
            <br/> 
            <label for="data">Data de Publicação: </label>
            <br/>
            <input type="text" name="txtData" id="data" size="15" onkeyup="mask_date(this.id);" value="<?php echo datetobr($resultado["data"]);?>" maxlength="10" onfocus="insertFormatURL('fonte');"/>
            <br/> 
            <label for="cbAutores">Autor: </label>
            <br/>
            <select name="cbAutores" id="cbAutores">
                <option value="0">-- Selecione --</option>
                 <?php
                    $SQL = "SELECT * FROM autor ORDER BY nome ASC";
                    $query = mysql_query($SQL, $conn);
                    while($exibir = mysql_fetch_array($query)){
                ?>
                    <option value="<?php echo $exibir["id"];?>"  <?php echo ($resultado["autor"] == $exibir["id"]) ? "selected='selected'" : "" ?>><?php echo $exibir["nome"];?></option>
                    <?php }?>
            </select>
            <br/> 
            <label for="conteudo">Conteúdo: </label>
            <br/>
            <textarea name="txtConteudo" id="conteudo" rows="20" cols="60"><?php echo $resultado["conteudo"];?></textarea>
            <br/>
                <input type="submit" value="Atualizar">
                <input type="reset" value="Limpar">
              </form>
             </fieldset>
            </div>
        <?php
            }
    }
        ?>
    </body>
</html>