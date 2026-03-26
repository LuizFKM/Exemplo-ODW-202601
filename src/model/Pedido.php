<?php

namespace model;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinTable;

#[ORM\Entity]
#[ORM\Table(name: 'tb_pedido')]
class Pedido extends GenericModel {

    #[ORM\Column(name:'data_pedido', type: 'datetime')]
    private $dataPedido;

    #[ORM\ManyToOne(targetEntity: Cliente::class)]
    #[ORM\JoinColumn(name: 'cliente_id')]
    private $cliente;

    #[ORM\ManyToMany(targetEntity: Produto::class)]
    #[ORM\JoinTable(name: 'tb_produtos_pedido')]
    #[ORM\JoinColumn(name: 'pedido_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'produto_id', referencedColumnName: 'id')]
    private $produtosPedido;

    public function getDataPedido()
    {
        return $this->dataPedido;
    }

    public function setDataPedido($dataPedido): void
    {
        $this->dataPedido = $dataPedido;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente($cliente): void
    {
        $this->cliente = $cliente;
    }

    public function getProdutosPedido()
    {
        return $this->produtosPedido;
    }

    public function setProdutosPedido($produtosPedido): void
    {
        $this->produtosPedido = $produtosPedido;
    }
}
