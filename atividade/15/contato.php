<?php
echo " <h1>Calendário de Contato</h1>";
$arquivo = 'contatos.txt';

if (isset($_POST['adicionar'])) {
  $nome = $_POST['nome'];
  $contato = $_POST['contato'];


  $contato = "$nome - $contato\n";
  file_put_contents($arquivo, $contato, FILE_APPEND);
  echo "<h3>Contato '$nome' adicionado com sucesso!</h3>";
} elseif (isset($_POST['listar'])) {

  if (file_exists($arquivo)) {
    $contatos = file_get_contents($arquivo);
    echo nl2br($contatos);
  } else {
    echo "<h3>Nenhum contato cadastrado.</h3>";
  }
} elseif (isset($_POST['limpar'])) {

  if (file_exists($arquivo)) {
    unlink($arquivo);
    echo "<h3>Todos os contato foram excluídos.</h3>";
  } else {
    echo "<h3>Nenhum contato para excluir.</h3>";
  }
}
echo "<br><a href='index.php'>Voltar</a>";
