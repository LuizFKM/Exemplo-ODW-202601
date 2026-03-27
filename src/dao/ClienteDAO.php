<?php

namespace dao;

use Exception;
use model\Cliente;
use utils\Conexao;

// Ele já herda todos os métodos do GenericDAO
class ClienteDAO extends GenericDAO
{
    protected static $modelClass = Cliente::class;

    // Utiliza "Magic Finders" construídas pelo repository do Doctrine  conforme os atributos da classe alvo mapeados
    // Mais informações no capítulo "Magic Finders" em: https://www.doctrine-project.org/documentation/manual/
    public static function buscarNome($nome)
    {
        try {
            $em = Conexao::getEntityManager();
            $repository = $em->getRepository(Cliente::class);
            // Usando a chamada "mágica" o doctrine reconhece o "nome" como um atributo de "Cliente" e compreender que desejamos buscar pelo atributo "nome"
            // Existem diferentes combinações e padrões que podem ser usadas nestas chamadas mágicas.
            return $repository->findByNome($nome);
        } catch (Exception $ex) {
            throw new Exception("Falha ao buscar cliente pelo nome. " . $ex->getMessage());
        }
    }

    // Idem ao anterior, mas ao invés de fazer uma chamada mágica, envia  uma lista de parâmetros e valores para serem filtrados
    public static function buscarNome2($nome)
    {
        try {
            $em = Conexao::getEntityManager();
            $repository = $em->getRepository(Cliente::class);
            return $repository->findBy(['nome' => $nome]);
        } catch (Exception $ex) {
            throw new Exception("Falha ao buscar cliente pelo nome. " . $ex->getMessage());
        }
    }

    // Utiliza abordagens de construção da consulta por meio de funções do repositório Doctrine
    // Mais informações em: https://www.doctrine-project.org/projects/doctrine-orm/en/3.6/reference/query-builder.html
    public static function buscarNomeQueryBuilder($nome){
        try {
            $em = Conexao::getEntityManager();
            $repository = $em->getRepository(Cliente::class);
            $queryBuilder = $repository->createQueryBuilder('c');
            $queryBuilder
                ->where('c.nome LIKE :nome')
                ->setParameter('nome', "%" . $nome . "%");
            return $queryBuilder->getQuery()->getResult();
        } catch (Exception $ex){
            throw new Exception("Falha ao buscar cliente pelo nome. " . $ex->getMessage());
        }
    }


    // Utiliza DQL - Doctrine Query Language
    // Mais informações em: https://www.doctrine-project.org/projects/doctrine-orm/en/3.6/reference/dql-doctrine-query-language.html
    public static function buscarNomeParecido($nome){
        try {
            $em = Conexao::getEntityManager();
            $query = $em->createQuery("SELECT c FROM model\Cliente c WHERE c.nome LIKE :nome");
            $query->setParameter("nome", "%" . $nome . "%");
            return $query->getResult();
        } catch (Exception $ex){
            throw new Exception("Falha ao buscar cliente pelo nome. " . $ex->getMessage());
        }
    }
}