<?php
// Incluir a conexão com o banco de dados
include('conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $livroId = $_POST['livro'];
    $dataEmprestimo = $_POST['dataEmprestimo'];
    $dataDevolucao = $_POST['dataDevolucao'];

    // Recuperar o ID do usuário (isso normalmente viria de uma sessão, mas vou adicionar como exemplo)
    // Aqui estamos assumindo que o usuário já está logado e seu ID foi obtido (ajuste conforme sua lógica de login)
    $usuarioId = 1;  // Isso é apenas um exemplo, substitua conforme o sistema de autenticação do usuário

    try {
        // Verificar se ainda há exemplares disponíveis do livro para empréstimo
        $sqlVerificaExemplares = "SELECT quantidade FROM Exemplares WHERE livro_id = :livro_id";
        $stmtVerifica = $pdo->prepare($sqlVerificaExemplares);
        $stmtVerifica->bindParam(':livro_id', $livroId);
        $stmtVerifica->execute();

        $exemplares = $stmtVerifica->fetch(PDO::FETCH_ASSOC);

        // Verificar se há exemplares disponíveis
        if ($exemplares['quantidade'] > 0) {
            // Realizar o empréstimo
            $sqlEmprestimo = "INSERT INTO Emprestimos (usuario_id, livro_id, data_emprestimo, data_devolucao) 
                              VALUES (:usuario_id, :livro_id, :data_emprestimo, :data_devolucao)";

            $stmtEmprestimo = $pdo->prepare($sqlEmprestimo);
            $stmtEmprestimo->bindParam(':usuario_id', $usuarioId);
            $stmtEmprestimo->bindParam(':livro_id', $livroId);
            $stmtEmprestimo->bindParam(':data_emprestimo', $dataEmprestimo);
            $stmtEmprestimo->bindParam(':data_devolucao', $dataDevolucao);
            $stmtEmprestimo->execute();

            // Reduzir a quantidade de exemplares disponíveis no banco de dados
            $sqlAtualizaExemplares = "UPDATE Exemplares SET quantidade = quantidade - 1 WHERE livro_id = :livro_id";
            $stmtAtualizaExemplares = $pdo->prepare($sqlAtualizaExemplares);
            $stmtAtualizaExemplares->bindParam(':livro_id', $livroId);
            $stmtAtualizaExemplares->execute();

            echo "<p>Empréstimo realizado com sucesso!</p>";
        } else {
            echo "<p>Desculpe, não há exemplares disponíveis deste livro.</p>";
        }
    } catch (PDOException $e) {
        echo "Erro ao realizar o empréstimo: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo de Livro - Biblioteca</title>
    <link rel="stylesheet" href="style.css">
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
        <h1>Empréstimo de Livro</h1>
        <form id="formEmprestimo" method="POST" action="emprestimo.php">
            <label for="livro">Escolha o Livro:</label>
            <select id="livro" name="livro" required>
                <option value="" disabled selected>Selecione um livro</option>
                <!-- Os livros disponíveis serão listados aqui -->
                <?php
                // Buscar livros disponíveis para empréstimo
                $sqlLivros = "SELECT id, titulo FROM Livros";
                $stmtLivros = $pdo->prepare($sqlLivros);
                $stmtLivros->execute();

                while ($livro = $stmtLivros->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $livro['id'] . "'>" . $livro['titulo'] . "</option>";
                }
                ?>
            </select>

            <label for="dataEmprestimo">Data do Empréstimo:</label>
            <input type="date" id="dataEmprestimo" name="dataEmprestimo" required>

            <label for="dataDevolucao">Data Prevista de Devolução:</label>
            <input type="date" id="dataDevolucao" name="dataDevolucao" required>

            <button type="submit">Realizar Empréstimo</button>
        </form>
    </div>

    <script src="scripts.js"></script>
</body>

</html>