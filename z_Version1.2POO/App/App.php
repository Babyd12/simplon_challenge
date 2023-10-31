<?php

namespace App;
// require dirname(__DIR__) . '/Core/config.php';  

    class App
    {
        private $settings = [];
        
        private static $_instance;
        protected static $dbInstance;
        
        public function __construct(){      
            $this -> settings = require  dirname(__DIR__) . '/Config/config.php';  
           
        }

        public static function getInstance(){
            if(is_null(self::$_instance)){
                self::$_instance = new App();
              
            }
            return self::$_instance;
         
        }

        private function __clone(){
             // Empêche le clonage de l'instance Only. Nerver trust to user OOoo Noooo 
        }

        public function getInstanceKey($key){
            if(!isset($this -> settings[$key])){
                return null;
            }
            return $this -> settings[$key]; 
        }

        public static function load(){
            session_start();
            
            define('ROOT', dirname(__DIR__));
            require dirname(__DIR__)  . '   \APP\Autoloader.php';
        
            Autoloader::register();
        
            // Supprimez la ligne suivante, car elle est redondante.
            // require 'Autoloader.php';
        
            require ROOT . '\\Core\\Autoloader.php';
            Autoloader::register();
        }
        


        public function getDb(){
           
            $config = Config::getInstance(dirname(__DIR__) .'\\Core\\config.php');
          
            if(is_null($this->dbInstance)){
                $this -> dbInstance = new MysqlDatabase($config->getDatabase('dbName'), $config);
            }
            return $this -> dbInstance;
        }


        
        

    }
?>