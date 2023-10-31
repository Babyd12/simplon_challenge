<?php
class Database 
{
    private $host; 
    private $db_name;
    private $db_user;
    private $db_pass;
    private $encoding;
    private $db;
    private static $instance; // Instance unique

    private function __construct($db_name, $host = 'localhost', $db_user = 'root', $db_pass = '', $encoding = 'utf8')
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->encoding = $encoding;
    }

    public static function getInstance($db_name, $host = 'localhost', $db_user = 'root', $db_pass = '', $encoding = 'utf8')
    {
        if (self::$instance === null) {
            self::$instance = new self($db_name, $host, $db_user, $db_pass, $encoding);
        }
        return self::$instance;
    }

    public function getDatabase()
    {
        if ($this->db == null) {
            $db = new PDO("mysql:host={$this->host};dbname={$this->db_name};charset={$this->encoding}", $this->db_user, $this->db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $db;
        }
        return $this->db;
    }
}


// $dbInstance = Database::getInstance("votre_db_name");
// $pdo = $dbInstance->getDatabase();
