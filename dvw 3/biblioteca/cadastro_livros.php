<?php
// Incluir a conexão com o banco de dados
include('conexao.php');

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $anoPublicacao = $_POST['anoPublicacao'];
    $categoria = $_POST['categoria'];
    $quantidade = $_POST['quantidade'];

    try {
        // Iniciar a transação
        $pdo->beginTransaction();

        // Verificar se o livro já existe no banco (duplicidade)
        $sqlVerificaLivro = "SELECT id FROM Livros WHERE titulo = :titulo";
        $stmtVerifica = $pdo->prepare($sqlVerificaLivro);
        $stmtVerifica->bindParam(':titulo', $titulo);
        $stmtVerifica->execute();

        // Se o livro já existir, não permitir duplicidade
        if ($stmtVerifica->rowCount() > 0) {
            echo "<p>Este livro já está cadastrado no sistema.</p>";
        } else {
            // Caso contrário, inserir o livro
            $sqlLivro = "INSERT INTO Livros (titulo, autor, ano_publicacao, categoria) 
                         VALUES (:titulo, :autor, :ano_publicacao, :categoria)";

            $stmtLivro = $pdo->prepare($sqlLivro);
            $stmtLivro->bindParam(':titulo', $titulo);
            $stmtLivro->bindParam(':autor', $autor);
            $stmtLivro->bindParam(':ano_publicacao', $anoPublicacao);
            $stmtLivro->bindParam(':categoria', $categoria);
            $stmtLivro->execute();

            // Pegar o ID do livro inserido
            $livroId = $pdo->lastInsertId();

            // Agora inserir a quantidade de exemplares
            $sqlExemplares = "INSERT INTO Exemplares (livro_id, quantidade) 
                              VALUES (:livro_id, :quantidade)";

            $stmtExemplares = $pdo->prepare($sqlExemplares);
            $stmtExemplares->bindParam(':livro_id', $livroId);
            $stmtExemplares->bindParam(':quantidade', $quantidade);
            $stmtExemplares->execute();

            // Confirmar a transação
            $pdo->commit();

            echo "<p>Livro cadastrado com sucesso!</p>";
        }
    } catch (PDOException $e) {
        // Em caso de erro, desfazer a transação e mostrar erro
        $pdo->rollBack();
        echo "Erro ao cadastrar o livro: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livro - Biblioteca</title>
    <link rel="stylesheet" href="styles.css">
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
        <h1>Cadastro de Livro</h1>
        <form id="formCadastroLivro" method="POST" action="cadastro_livros.php">
            <label for="titulo">Título do Livro:</label>
            <input type="text" id="titulo" name="titulo" required>
            <div id="tituloError" class="error-message"></div>

            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required>

            <label for="anoPublicacao">Ano de Publicação:</label>
            <input type="number" id="anoPublicacao" name="anoPublicacao" required>

            <label for="categoria">Categoria:</label>
            <input type="text" id="categoria" name="categoria" required>

            <label for="quantidade">Quantidade de Unidades:</label>
            <input type="number" id="quantidade" name="quantidade" required>

            <button type="submit">Cadastrar Livro</button>
        </form>
    </div>

    <script src="scripts.js"></script>
</body>

</html>