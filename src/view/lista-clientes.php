<?php /** @var \model\Cliente[] $clientes */ ?>
<?php /** @var \model\Cliente $cliente */ ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem de Clientes</title>
</head>
<body>
<h1>Listagem de Clientes</h1>
<table>
    <thead>
    <th>#</th>
    <th>Nome</th>
    <th>CPF</th>
    <th>Opções</th>
    </thead>
    <tbody>
    <?php foreach ($clientes as $cliente) : ?>
        <?= "<tr>" ?>
        <?= "<td>{$cliente->getId()}</td>" ?>
        <?= "<td>{$cliente->getNome()}</td>" ?>
        <?= "<td>{$cliente->getCpf()}</td>" ?>
        <?= "<td><a href=" . BASE_URL . "/clientes/" . $cliente->getId() . ">Visualizar</a></td>" ?>
        <?= "</tr>" ?>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>