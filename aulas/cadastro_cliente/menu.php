<?php
session_start(); // Iniciar a sessão

// Verifique se o nível de acesso está definido na sessão
if (!isset($_SESSION['nivel_acesso'])) {
    header('Location: login.php'); // Se não estiver autenticado, redirecionar para o login
    exit;
}

// Defina a variável de nível de acesso
$nivel_acesso = $_SESSION['nivel_acesso'];
?>
<!-- Barra de navegação com bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistema</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="redirect.php">Página Inicial</a>
        </li>
        <?php if ($nivel_acesso == 'ADMINISTRADOR'): ?>
        <li class="nav-item">
          <a class="nav-link" href="lista_usuarios.php">Lista de Usuários</a>
        </li>
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="lista_clientes.php">Lista de Clientes</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <span class="nav-link">Bem-vindo,
            <?php echo isset($_SESSION['nome_usuario']) ? $_SESSION['nome_usuario'] : 'Usuário'; ?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-danger" href="logout.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Inclua Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>