<?php
echo "<h1>Verificador de Disponibilidade de Domínio</h1>";
if (isset($_POST['dominio']) && !empty($_POST['dominio'])) {
    $dominio = $_POST['dominio'];
    // Usando a API de Whois para verificar a disponibilidade do domínio
    $api_url = "https://api.domainsdb.info/v1/domains/search?domain=$dominio&zone=com";

    $resposta = file_get_contents($api_url);
    $dados = json_decode($resposta, true);

    // Verifica se o domínio está disponível
    if (isset($dados['domains']) && count($dados['domains']) > 0) {
        $disponivel = false;
    } else {
        $disponivel = true;
    }
} else {
    echo "Nenhum domínio inserido.";
    exit();
}

echo " <h1>Resultado da Verificação</h1>";
if ($disponivel) {
    echo "<p>O domínio $dominio está disponível para registro!</p>";
} else {
    echo "<p>O domínio $dominio já está registrado.</p>";
}
echo "<br><a href='index.php'>Voltar</a>";
