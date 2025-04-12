<?php
echo " <h3>Cadastro de usuario</h3>";
$nome = ($_POST['nome']);
$email = ($_POST['email']);
$senha = ($_POST['senha']);
$erros = [];


if (empty($nome)) {
    $erros[] = "O campo nome é obrigatório.";
}

if (empty($email)) {
    $erros[] = "O campo e-mail é obrigatório.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $erros[] = "O e-mail informado é inválido.";
}

if (empty($senha)) {
    $erros[] = "O campo senha é obrigatório.";
} elseif (strlen($senha) < 6) {
    $erros[] = "A senha deve ter no mínimo 6 caracteres.";
}


if (!empty($erros)) {
    foreach ($erros as $erro) {
        echo "<p style='color: red;'>$erro</p>";
    }
} else {
    echo "<h3>Cadastro realizado com sucesso para o usuário $nome!</h3>";
}
echo "<br><a href='index.php'>Voltar</a>";