<?php
// Caminho do arquivo JSON onde as transações estão armazenadas
$arquivo = 'transacoes.json';

// Carregar os dados existentes do arquivo JSON
$transacoes = [];
if (file_exists($arquivo)) {
  $json = file_get_contents($arquivo);
  $transacoes = json_decode($json, true) ?? [];
}

// Calcular o saldo atual
$saldo = 0;
foreach ($transacoes as $transacao) {
  if ($transacao['tipo'] == 'receita') {
    $saldo += $transacao['valor'];
  } else {
    $saldo -= $transacao['valor'];
  }
}

// Obter relatório de gastos por categoria
$relatorio = [];
foreach ($transacoes as $transacao) {
  $categoria = $transacao['categoria'];
  if (!isset($relatorio[$categoria])) {
    $relatorio[$categoria] = ['receitas' => 0, 'despesas' => 0];
  }
  if ($transacao['tipo'] == 'receita') {
    $relatorio[$categoria]['receitas'] += $transacao['valor'];
  } else {
    $relatorio[$categoria]['despesas'] += $transacao['valor'];
  }
}

// Exibir o saldo e o relatório
echo "<h1>Relatório de Finanças</h1>";
echo "<h4>Saldo Atual: R$ " . number_format($saldo, 2, ',', '.') . "</h4>";

echo "<table border='1'>
        <tr>
            <th>Categoria</th>
            <th>Total Receitas (R$)</th>
            <th>Total Despesas (R$)</th>
        </tr>";

foreach ($relatorio as $categoria => $totais) {
  echo "<tr>
            <td>$categoria</td>
            <td>R$ " . number_format($totais['receitas'], 2, ',', '.') . "</td>
            <td>R$ " . number_format($totais['despesas'], 2, ',', '.') . "</td>
          </tr>";
}

echo "</table>";
echo "<br><a href='index.php'>Registrar Nova Transação</a>";