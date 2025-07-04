<?php

namespace App\DB;

use App\Connection;
use \PDO;
use \PDOException;

class Database
{
    private $table;

    private $connection;

    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    public function setConnection()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=localhost;dbname=appmeu;charset=utf8",
                "root",
                ""
            );
        } catch (PDOException $e) {
            die("PDO ERROR" . $e->getMessage());
        }
    }

    public function execute($querry, $params = []) {
        try{
            $statemanet = $this->connection->prepare($querry);
            $statemanet->execute($params);
            return $statemanet;
        }catch(PDOException $e){
            die('Erro'.$e->getMessage());

        }

    }


    public function insert($values)
    {

        //dados da querry
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //Montar a querry
        $querry = 'insert into ' . $this->table . '(' . implode(',', $fields) . ')values(' . implode(',', $binds) . ')';
        $this->execute($querry, array_values($values));

        //Retorna do ID Inserido
        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order =null, $limit = null, $fields = null){
        //DADOS DA QUERRY
        $where = strlen($where) ? 'WHERE'.$where: '';
        $order = strlen($order) ? 'ORDER BY'.$order: '';
        $limit = strlen($limit) ? 'LIMIT'.$limit: '';

        $querry = 'select  * from chamados';

        return $this->execute($querry);
        
    }
}
