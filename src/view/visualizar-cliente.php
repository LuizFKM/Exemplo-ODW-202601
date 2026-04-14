<?php /**  @var model\Cliente $cliente ; */ ?>
<?php /**  @var model\Contato $contato ; */ ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $cliente->getNome() ?></title>
</head>
<body>
<h1><?= $cliente->getNome() ?></h1>
<h2><?= $cliente->getCpf() ?></h2>
<h2><?= $cliente->getId() ?></h2>

<ul>
    <?php foreach ($cliente->getContatos() as $contato) :  ?>
    <li><?= $contato->getTelefone() ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>