<?php

namespace App;

class Connection
{

    private $db;

    public static function getDb()
    {

        // CARREGA O ARQUIVO DE CONFIGURAÇÃO DO DNS

        try {

            $db = new \PDO(
                "mysql:host=localhost;dbname=apptask;charset=utf8",
                'root',
                ''
            );

            return $db;
        } catch (\PDOException $Error) {
            echo 'Erro de  PDO ' . $Error;
        }

    }

}



?>