<?php 
require_once (dirname(__DIR__)) .DIRECTORY_SEPARATOR. 'utile.php';

require ROOT.DS.'App'.DS.'Model'.DS.'Database.php';

class App {

    private static $_instance;
    

    public static function getInstance($config_db = null)
    {
        if(!is_null($config_db)){
            if (static::$_instance === null) {
                static::$_instance = new Database($config_db);
            }
            return static::$_instance;
        }else{
            if (static::$_instance === null) {
                static::$_instance = new Database();
            }
            return static::$_instance;
        }
    }



}

  //var_dump(App::getInstance()->getConnexion()->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC)); 
