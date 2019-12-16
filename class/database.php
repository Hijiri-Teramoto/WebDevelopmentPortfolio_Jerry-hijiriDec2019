<?php
    class database{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "portfolio";
        public $conn;

        public function __construct(){
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
            if($this->conn->connect_error){
                die("Connection Error".$this->conn->connect_error);
            }
            return $this->conn;
        }
    }

?>