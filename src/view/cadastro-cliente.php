<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Cliente</title>
</head>
<body>
<!-- Os formulários possuem dois atributos principais -->
<!-- o action indica o endereço da página que vai receber os dados -->
<!-- o method indica o tipo da requisição (se GET ou POST) -->
<!-- Usamos formulários quando queremos capturar dados do usuário para algo -->
<!-- e usar eles para alguma operação do sistema -->
    <form action="<?= BASE_URL . '/clientes/cadastrar' ?>" method="POST">
        <!-- O label é um texto que aparece e indica o que será inserido -->
        <!-- No seu atributo 'for', colocamos o ID do campo que ele é label  -->
        <label for="nome">Nome:</label>
        <!-- O input tem um id, que deve ser único em toda a página-->
        <!-- o name é usado para transferir os dados do formulário pra o action -->
        <!-- type indica o tipo do formulário (Se é data, numero, texto, senha) -->
        <!-- required indica que o campo é obrigatório -->
        <input id="nome" name="nome" type="text" required>
        <br>

        <label for="cpf">CPF</label>
        <input id="cpf" name="cpf" type="text" required>
        <br>

        <label for="data_nascimento">Data de Nascimento</label>
        <input id="data_nascimento" name="data_nascimento" type="date" required>
        <br>

        <!-- O botão "Submit" vai encaminhar o formulário para o ation correspondente -->
        <button type="submit">Cadastrar</button>

    </form>
</body>
</html>