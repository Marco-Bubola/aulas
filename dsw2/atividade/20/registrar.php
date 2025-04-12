<?php
// Caminho do arquivo JSON onde as transações serão armazenadas
$arquivo = 'transacoes.json';

// Carregar os dados existentes do arquivo JSON
$transacoes = [];
if (file_exists($arquivo)) {
    $json = file_get_contents($arquivo);
    $transacoes = json_decode($json, true) ?? [];
}

// Receber os dados do formulário
$tipo = $_POST['tipo'];
$categoria = $_POST['categoria'];
$valor = floatval($_POST['valor']);
$data = date('Y-m-d H:i:s');

// Criar um novo registro de transação
$novaTransacao = [
    'tipo' => $tipo,
    'categoria' => $categoria,
    'valor' => $valor,
    'data' => $data
];

// Adicionar a nova transação ao array de transações
$transacoes[] = $novaTransacao;

// Salvar os dados atualizados de volta no arquivo JSON
file_put_contents($arquivo, json_encode($transacoes, JSON_PRETTY_PRINT));
echo "<h1>Sistema de Controle de Finanças Pessoais</h1>";
echo "<h1>Registro Adicionado com Sucesso!</h1>";
echo "<a href='index.php'>Voltar</a>";
