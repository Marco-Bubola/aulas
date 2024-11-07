<?php
function calcularFrete($peso, $destino)
{

    $tabelaFrete = [
        'São Paulo' => 10.00,
        'Rio de Janeiro' => 12.00,
        'Belo Horizonte' => 15.00,
        'Brasília' => 13.00,
        'Manaus' => 14.00,
        'Fortaleza' => 15.00,
        'Salvador' => 16.00,
        'Recife' => 14.00,
        'Porto Alegre' => 13.00,
        'Cuiabá' => 14.00
    ];

    $valorBase = $tabelaFrete[$destino];
    $valorFrete = $valorBase * $peso;
    return number_format($valorFrete, 2, ',', '.');
}

$peso = $_POST['peso'];
$destino = $_POST['destino'];

$valorFrete = calcularFrete($peso, $destino);
echo  "<h1>Calculadora de Frete</h1>";
echo "<h1>Resultado do Cálculo do Frete</h1>";
echo "<p>Destino: $destino</p>";
echo "<p>Peso: $peso kg</p>";
echo "<p>Valor do Frete: R$ $valorFrete</p>";
echo "<br><a href='index.php'>Voltar</a>";
