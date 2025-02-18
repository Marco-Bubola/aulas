<?php
$nome = $_POST['nome'];
$email = $_POST['email'];

echo "<h1>Cadastro realizado com sucesso para $nome</h1>";
if (isset($_POST['cep'])) {
    $cep = preg_replace('/[^0-9]/', '', $_POST['cep']);

    if (strlen($cep) == 8) {

        $url = "https://viacep.com.br/ws/$cep/json/";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);
        curl_close($ch);

        $endereco = json_decode($resultado, true);

        if (isset($endereco['erro'])) {
            echo "<h3>CEP não encontrado.</h3>";
        } else {
            echo "<h3>Endereço encontrado:</h3>";
            echo "<h3>CEP: $cep</h3>";
            echo "<h3>" . $endereco['logradouro'] . ",<br> " . $endereco['bairro'] . " - " . $endereco['localidade'] . " - " . $endereco['uf'] . "</h3>";
        }
    } else {
        echo "<h3>Por favor, insira um CEP válido com 8 dígitos.</h3>";
    }
} else {
    echo "<h3>Por favor, insira um CEP.</h3>";
}
echo "<h3>E-mail: $email</h3>";
echo "<br><a href='index.php'>Voltar</a>";