<?php
$hostname = "localhost";
$username = "root";
$password = "12345";
$database = "testes";
$row_limit = 8;
$sgbd = 'mysql'; // mysql, pgsql

// connect to mysql
try {
    $pdo = new PDO($sgbd.":host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    die("Error! " . $err->getMessage());
}
