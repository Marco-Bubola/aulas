<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simulador de Emprestimo</title>
  <style>
  /* Reseta alguns estilos padrão para garantir consistência */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
  }

  /* Estiliza o body e centraliza o conteúdo de forma proporcional */
  body {
    background-color: #f4f4f4;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 20px;
    /* Adiciona um padding para evitar que o conteúdo encoste nas bordas */
  }

  /* Estiliza o container principal e permite que se ajuste ao tamanho da página */
  div {
    background-color: #fff;
    padding: 5vw 5vh;
    /* Padding proporcional ao viewport */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    max-width: 40vw;
    /* Ajusta o máximo de largura para 40% da viewport */
    width: 100%;
    text-align: center;
    min-width: 320px;
    /* Garante uma largura mínima */
  }

  /* Estiliza os títulos */
  h2 {
    color: #007BFF;
    margin-bottom: 2vh;
  }

  h3 {
    margin-bottom: 3vh;
    font-weight: 300;
    color: #555;
  }

  /* Estiliza os labels */
  label {
    font-weight: bold;
    display: block;
    margin-bottom: 0.5vh;
    text-align: left;
  }

  /* Estiliza os campos de input */
  input[type="text"],
  input[type="number"],
  select {
    width: 100%;
    padding: 1vh 1vw;
    margin-bottom: 3vh;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
  }

  /* Estiliza os radio buttons e checkbox */
  input[type="radio"],
  input[type="checkbox"] {
    margin-right: 10px;
  }

  label[for="seguro"] {
    font-weight: normal;
  }

  /* Estiliza o botão de envio */
  input[type="submit"] {
    background-color: #28a745;
    color: white;
    padding: 1.2vh 2vw;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 1rem;
  }

  /* Hover para o botão */
  input[type="submit"]:hover {
    background-color: #218838;
  }

  /* Adaptação para dispositivos móveis */
  @media (max-width: 768px) {
    div {
      padding: 5vw;
      max-width: 80vw;
      /* Ajusta para telas menores */
    }

    input[type="submit"] {
      padding: 1.5vh 3vw;
    }
  }
  </style>
</head>

<body>
  <div>
    <h2>Seja bem vindo ao Mybank</h2>
    <h3>Simulador de Emprestimo</h3>
    <form action="calcular.php" method="post">
      <Label for="nome">Nome: </Label>
      <input type="text" name="nome" id="nome"><br /><br />
      <label for="cliente"> Já é nosso cliente?</label>
      <input type="radio" name="cliente" value="s" id="sim" checked>sim
      <input type="radio" name="cliente" value="n" id="nao">nao<br /><br />
      <Label for="score">Digite seu Serasa Score: </Label>
      <input type="number" name="score" id="score" value="100"><br /><br />
      <Label for="valor">Valor do emprestimo: </Label>
      <input type="number" name="valor" id="valor" value="0"><br /><br />
      <Label for="parcela">Quantidade de Parcelas: </Label>
      <select name="parcela" id="parcela">
        Quantidade de parcela:
        <option value="1">Selecione parcela</option>
        <option value="3">3</option>
        <option value="6">6</option>
        <option value="12">12</option>
        <option value="18">18</option>
        <option value="24">24</option>
      </select><br /><br>
      <label for="seguro"><input type="checkbox" name="seguro" id="seguro">Desejo incluir seguro desemprego no valor de
        R$59,90</label><br><br>
      <input type="submit" value="Simular emprestimo">
    </form>
  </div>
</body>

</html>