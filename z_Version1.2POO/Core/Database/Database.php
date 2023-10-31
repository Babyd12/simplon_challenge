<?php
   namespace Core\App;
   
    use \PDO;

    class Database 
    {
        private $host; 
        private $db_name;
        private $db_user;
        private $db_pass;
        private $encoding;
        private $db;
        public $id;

        public function __construct($db_name, $host = 'localhost', $db_user='root', $db_pass = '', $encoding = 'utf8')
        {
            echo $this -> id = uniqid();
            $this -> host = $host;
            $this -> db_name = $db_name;
            $this -> db_user = $db_user;
            $this -> db_pass = $db_pass;
            $this -> encoding = $encoding;
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

        public function queryStatement($statement){
            // $db = $this ->db;
            $exe = $this ->getDatabase()->query($statement);
            $datas = $exe->fetchAll(PDO::FETCH_OBJ);
            return $datas;
        }

        public function  showAllInTables($tableName){
            $exe = $this -> getDatabase()->query("SELECT * FROM $tableName");
            $datas = $exe->fetchAll(PDO::FETCH_OBJ);
            return $datas;
            
        }




    }
    


    
?>