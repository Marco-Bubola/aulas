<?php
session_start();
?>

<!-- Barra de navegação com bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- Exibição da data no lado esquerdo -->
    <div class="navbar-brand">
      <span id="date-time" class="navbar-text"></span>
    </div>

    <!-- Nome da loja no centro -->
    <div class="mx-auto">
      <a class="navbar-brand" href="index.php">Shop System</a>
    </div>

    <!-- Links de login e cadastro no lado direito -->
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastro_usuario.php">Cadastro</a>
      </li>
    </ul>
  </div>
</nav>

<!-- Inclua Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Função para atualizar a data
function updateDate() {
  const now = new Date();
  const options = {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  };
  document.getElementById('date-time').innerText = now.toLocaleDateString('pt-BR', options);
}

// Atualiza a data quando a página carrega
updateDate();
</script>