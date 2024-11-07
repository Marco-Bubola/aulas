<?php
    // Dados Conexão MySQL
    $server = "localhost";
    $user = "root";
    $pw = "123";
    $dbname = "dbrlsystem";
    $conn = mysql_connect($server, $user, $pw);
    $db = mysql_select_db($dbname, $conn);
?>
