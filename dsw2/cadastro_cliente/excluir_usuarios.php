<?php

include 'conexao.php';

$id = $_GET['id'];
$usuarios = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
$usuarios->execute([$id]);
$stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->execute([$id]);

header("Location: lista_usuarios.php");
exit;
