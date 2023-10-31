<?php


namespace Core\App;

class DBAuth {
    private $db;

    public function __construct(Database $db){
        return $this -> db -> $db;
    }

   
    public function login($username, $password){
        $statement = 'SELECT * FROM users WHERE username = ?';
        $user = $this -> db ->prepareQuery($statement, [$username], null, true );
        var_dump($user);
    }

    /*
    return bool 
    */
    public function logged(){
        return isset($_SESSION['auth_token']);
             
    }
         
    
}