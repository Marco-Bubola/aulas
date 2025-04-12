<?php
// Incluir a conexão com o banco de dados
include('conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $ra = $_POST['ra'];
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];
    $dataIngresso = $_POST['dataIngresso'];
    $telefone = $_POST['telefone'];

    // Preparar a consulta SQL para inserir o usuário no banco de dados
    try {
        $sql = "INSERT INTO Usuarios (ra, nome, curso, data_ingresso, telefone) 
                VALUES (:ra, :nome, :curso, :data_ingresso, :telefone)";

        $stmt = $pdo->prepare($sql);

        // Vincular os parâmetros
        $stmt->bindParam(':ra', $ra);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':curso', $curso);
        $stmt->bindParam(':data_ingresso', $dataIngresso);
        $stmt->bindParam(':telefone', $telefone);

        // Executar a consulta
        $stmt->execute();

        // Mensagem de sucesso
        echo "<p>Cadastro realizado com sucesso!</p>";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário - Biblioteca</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="cadastro.php">Cadastro de Usuário</a></li>
            <li><a href="cadastro_livros.php">Cadastro de Livro</a></li>
            <li><a href="emprestimo.php">Empréstimo de Livro</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Cadastro de Aluno</h1>
        <form id="formCadastro" method="POST" action="cadastro.php">
            <label for="ra">RA (Registro Acadêmico):</label>
            <input type="text" id="ra" name="ra" required>

            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="curso">Curso:</label>
            <input type="text" id="curso" name="curso" required>

            <label for="dataIngresso">Data de Ingresso:</label>
            <input type="date" id="dataIngresso" name="dataIngresso" required>

            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <script src="scripts.js"></script>
</body>

</html>