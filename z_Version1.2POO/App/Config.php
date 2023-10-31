<?php

   
    class Config
    {
        private $settings = [];
        
        private static $_instance;
        
        public function __construct($file){      
            $this -> settings = require ($file);
           
        }

        public static function getInstance($file){
            if(is_null(self::$_instance)){
                self::$_instance = new Config($file);
              
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
    }
?>