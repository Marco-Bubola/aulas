var xmlHttp = new XMLHttpRequest();
var autorNome = "";

function salvarAutor(nome){
    autorNome = nome;
    var url = "insertAutor.php?nome=" + autorNome;
    xmlHttp.onreadystatechange = stateChanged;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
    
    if(xmlHttp.readyState == 1){
        document.getElementById("autor").innerHTML = "Cadastrando.....";
    }
}

function stateChanged(){
    if(xmlHttp.readyState == 4){
       var comboUser = document.getElementById("cbAutores");
       var option = document.createElement("option");
       
       if(xmlHttp.responseText != "N"){
           option.value = xmlHttp.responseText;
           option.text = autorNome;
           comboUser.add(option, comboUser.options[null]);
           comboUser.selectedIndex = comboUser.length - 1;
           document.getElementById("autor").innerHTML = "";
       } else {
           document.getElementById("autor").innerHTML = "Erro no cadastro. Tente novamente.";
       }
    }
}