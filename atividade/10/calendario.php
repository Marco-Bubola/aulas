<?php
echo "<h1>Calendário de Eventos</h1>";
$arquivo = 'eventos.txt';

if (isset($_POST['adicionar'])) {
  // Adiciona evento
  $nome = $_POST['nome'];
  $data = $_POST['data'];

  // Salva no arquivo
  $evento = "$nome - $data\n";
  file_put_contents($arquivo, $evento, FILE_APPEND);
  echo "<h3>Evento '$nome' adicionado com sucesso!</h3>";
} elseif (isset($_POST['listar'])) {
  // Lista todos os eventos
  if (file_exists($arquivo)) {
    $eventos = file_get_contents($arquivo);
    echo nl2br($eventos);
  } else {
    echo "<h3>Nenhum evento cadastrado.</h3>";
  }
} elseif (isset($_POST['limpar'])) {
  // Limpa todos os eventos
  if (file_exists($arquivo)) {
    unlink($arquivo);
    echo "<h3>Todos os eventos foram excluídos.</h3>";
  } else {
    echo "<h3>Nenhum evento para excluir.</h3>";
  }
}
echo "<br><a href='index.php'>Voltar</a>";
