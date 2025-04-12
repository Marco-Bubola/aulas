<?php
// Configurações de conexão com o banco de dados
$host = 'localhost'; // Pode ser 'localhost' ou o IP do seu servidor de banco de dados
$dbname = 'Biblioteca'; // Nome do banco de dados
$username = 'root'; // Nome do usuário do banco de dados (alterar se necessário)
$password = '12345'; // Senha do banco de dados (se houver, coloque a senha aqui)

// Criar a conexão com o banco de dados
try {
    // Conectar ao banco de dados usando PDO (PHP Data Objects)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Definir o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Caso a conexão seja bem-sucedida, mostrar uma mensagem (opcional)
    // echo "Conectado com sucesso!";
} catch (PDOException $e) {
    // Caso ocorra algum erro, exibe a mensagem de erro
    echo "Falha na conexão: " . $e->getMessage();
    exit;
}
