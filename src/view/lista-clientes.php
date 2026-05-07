<?php
/** @var \model\Cliente[] $clientes */
/** @var \model\Cliente $cliente */
$rota_clientes = BASE_URL . "/clientes";
?>
<!doctype html>
<html lang="pt-br" data-bs-theme="dark">
<head>
    <?php require_once 'templates/template-head.php' ?>
    <title>Listagem de Clientes</title>
</head>
<body class="container">

<?php require_once "templates/template-menu.php" ?>

<h1>Listagem de Clientes</h1>
<a href="<?= BASE_URL . '/clientes/novo' ?>">Cadastrar Cliente</a>
<table>
    <thead>,
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>CPF</th>
        <th>Opções</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($clientes as $cliente) : ?>
        <tr>
            <td><?= $cliente->getId() ?></td>
            <td><?= htmlspecialchars($cliente->getNome()) ?></td>
            <td><?= $cliente->getCpf() ?></td>
            <td>
                <a href="<?= $rota_clientes . '/' . $cliente->getId() . '/editar' ?>">Editar</a>
                <a href='<?= $rota_clientes . '/' . $cliente->getId() ?>'>Visualizar</a>
                <form action='<?= $rota_clientes . '/' . $cliente->getId() . '/remover' ?>' method='POST'>
                    <button type='submit'>Remover</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require_once "templates/template-rodape.php" ?>

</body>
</html>