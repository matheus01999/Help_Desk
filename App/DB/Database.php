<?php

namespace App\DB;
use App\Connection;
use \PDO;
use \PDOException;
class Database{
        private $table;

        private $connection;

    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
        
        
    }

    public function setConnection(){
        try{
            $this->connection = new PDO(
                "mysql:host=localhost;dbname=helpdsk;charset=utf8",
				"oppo",
				"60265146" 
            );
        }catch(PDOException $e){
            die("PDO ERROR". $e->getMessage());
        }
}


    public function insertTest($values){

        //dados da querry
        $fields = array_keys($values);
        $querry = 'insert into '.$this->table.'('.implode(',',$fields).')values(?,?,?,?)';
        echo $querry;
        
    }




}


        

    



?>