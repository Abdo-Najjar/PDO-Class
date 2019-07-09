<?php
class DBConnection
{
    private $host = "localhost";
    private $user_name="";
    private $db_name = "";
    private $password="";
    private $conn ;
    private  static $instance = null;
        private function __construct()
        {
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name,$this->user_name,$this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
                die("Connection Error ".$e->getMessage());
            }
        }
        public static function get_instance(){
            if(self::$instance==null){
               self::$instance = new DBConnection;
            }
            return self::$instance;
        }
        public function getConnection(){
            return $this->conn;
        }
}
