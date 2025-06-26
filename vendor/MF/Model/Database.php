<?php

namespace MF\Database;


class Database
{
    private $table;



    protected $db;

    public function __construct($table = null)
    {
        $this->table = $table;
        
    }

    
    public function execute($querry, $params = [])
    {
        try {
            $statemanet = $this->db->prepare($querry);
            $statemanet->execute($params);
            return $statemanet;
        } catch (\PDOException $e) {
            die('Erro' . $e->getMessage());
        }
    }


    // METODO RESPONSAVEL POR SALAVR UM REGISTRO NO BANCO
    public function insert($values)
    {

        // DADOS PARA A QUERRY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        // MONTA A QUERRY
        $querry = 'insert into ' . $this->table . '(' . implode(',', $fields) . ')values(' . implode(',', $binds) . ')';
        $this->execute($querry, array_values($values));

        //Retorna do ID Inserido
        return $this->db->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        //DADOS DA QUERRY
        $where = strlen($where) ? 'WHERE ' . $where : '';
        $order = strlen($order) ? 'ORDER BY ' . $order : '';
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        // MONTA A QUERRY COM BASE NOS DADOS
        $querry = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        return $this->execute($querry);
    }
}
