<?php

include 'conexao.php';

$id = $_GET['id'];
$cliente = $conn->prepare("SELECT pdf FROM clientes WHERE id = ?");
$cliente->execute([$id]);
$cliente = $cliente->fetch(PDO::FETCH_ASSOC);

// Excluir o arquivo PDF do Servidor
if (file_exists("uploads/" . $cliente['pdf'])) {
    unlink("uploads/" . $cliente['pdf']);
}

$stmt = $conn->prepare("DELETE FROM clientes WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;

?>