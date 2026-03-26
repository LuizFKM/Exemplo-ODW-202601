<?php

namespace dao;

use Exception;
use model\Cliente;
use utils\Conexao;

// Ele já herda todos os métodos do GenericDAO
class ClienteDAO extends GenericDAO
{
    protected static $modelClass = Cliente::class;
}