<?php

class Database {
    
   
    private $connexion;
    

    public function __construct($dynamic_db_config = null) 
    {

        if(!is_null($dynamic_db_config)){

            $config = $dynamic_db_config;
            try {
                $this->connexion = new PDO(
                    "mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_password']
                );
                $this ->connexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die('<strong> MORTAL FATAL ERROR </strong> Connexion to the database failed :  Your file configuration is not same that your database configuration');
    
            }
        } 
        else {
            $config = require dirname(dirname(__DIR__)).'/config.php';

            try {
                $this->connexion = new PDO(
                    "mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_password']
                );
                $this ->connexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die('<strong> MORTAL FATAL ERROR </strong> Connexion to the database failed :  Your file configuration is not same that your database configuration');
    
            }
        }


    }

    public function getConnexion(){
        return $this -> connexion;
    }


    // public function Query($statement, $class_name){
    //     $req = $this -> getConnexion()->query($statement);
    //     $datas = $req ->fetchAll(PDO::FETCH_CLASS, $class_name);
    //     return $datas;
    // }

}


// var_dump(Database::getInstance()->getConnexion()->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC));