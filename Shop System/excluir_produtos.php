<?php

include 'conexao.php';

$id = $_GET['id'];
$produtos = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
$produtos->execute([$id]);
$stmt = $conn->prepare("DELETE FROM produtos WHERE id = ?");
$stmt->execute([$id]);

header("Location: lista_produtos.php");
exit;