<?php
$velo = $_POST['velo'];
$distancia = $_POST['distancia'];

$tempo = $distancia / $velo;
echo "  <h1>Calculadora de Frete</h1>";
echo "<h3>A viagem deverar durar: " . $tempo . "h</h3>";
echo "<br><a href='index.php'>Voltar</a>";
