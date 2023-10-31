<?php
   namespace Core\App;
   
    use \PDO;

    class MysqlDatabase 
    {
        private $host; 
        private $db_name;
        private $db_user;
        private $db_pass;
  
        private $db;

        public function __construct($db_name, $host = 'localhost', $db_user='root', $db_pass = '')
        {
        
            $this -> host = $host;
            $this -> db_name = $db_name;
            $this -> db_user = $db_user;
            $this -> db_pass = $db_pass;
  
        }

        public function getDatabase()
        {
            if($this -> db == null){
                $db=new PDO('mysql:host=localhost;dbname=ibokotaxi;charset=utf8','root','');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this -> db  = $db;
                // var_dump('POD: initialize');
            }
            // var_dump('POD: called');
            return $this ->db;
        }

        public function queryStatement($statement, $className = null, $one = false){
            // $db = $this ->db;
            $exe = $this ->getDatabase()->query($statement);
            if($className === null){
                $exe ->setFetchMode(PDO::FETCH_OBJ);
            } else {
                $exe ->setFetchMode(PDO::FETCH_CLASS, $className);
            }

            if($one){
                $datas = $exe->fetch();
            } else {
                $datas = $exe->fetchAll();
            }
           
            return $datas;
        }

        public function executeQuery($statement, $binding, $className = null, $one = false) {
            $req = $this->getDatabase()->prepare($statement);
            $req->execute($binding);
        
            if ($one) {
                $data = $req->fetch(PDO::FETCH_ASSOC); // Vous pouvez utiliser FETCH_ASSOC ou FETCH_OBJ selon votre préférence
            } else {
                $data = $req->fetchAll(PDO::FETCH_ASSOC); // Ou FETCH_OBJ ici également
            }
        
            return $data;
        }
            

        public function  showAllInTables($tableName){
            $exe = $this -> getDatabase()->query("SELECT * FROM $tableName");
            $datas = $exe->fetchAll(PDO::FETCH_OBJ);
            return $datas;
            
        }




    }
    


    
?>