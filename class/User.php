<?php
    // session_start();
    require_once 'database.php';
    class User extends database{
        public function register($username, $email, $password){
            $sql = "INSERT INTO `user`(username, email, password) VALUES('$username', '$email', '$password') ";

            if($this->conn->query($sql)){
                header("Location: register&login/login.php");
            }else{
                echo "Insertion Error";
            }
        }
        public function login($yourName, $yourPass){
            $sql = "SELECT * FROM `user` WHERE username = '$yourName' AND password ='$yourPass'";

            
            $rows = array();
            $result = $this->conn->query($sql);
            
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        public function about($userid){
            $sql = "SELECT * FROM `user` WHERE user_id = '$userid'";

            $rows = array();
            $result = $this->conn->query($sql);
            
            while($row = $result->fetch_assoc()){
                $rows[] = $row;

            }
            return $rows;
                    
        }
        public function updateProfile($userid, $uname, $bio, $uFName, $uLName, $email, $phone, $nationality, $occupation, $pword, $image_name, $birthday){
            $sql = "UPDATE `user` 
                SET username = '$uname', 
                bio = '$bio', 
                user_first_name = '$uFName', 
                user_last_name = '$uLName', 
                email = '$email', 
                phone = '$phone', 
                nationality = '$nationality', 
                occupation = '$occupation', 
                password = '$pword',
                user_picture = '$image_name',
                user_birthday = '$birthday' 
                
                WHERE user_id = '$userid'
                ";
            if($this->conn->query($sql)){
                
                print_r($sql);
                header("Location: about.php");
            }
        }
        public function viewUsers(){
            $sql ="SELECT * FROM `user`";
            $rows = array();
            $result = $this->conn->query($sql);
            while($row = $result->fetch_assoc()){
                $rows[] = $row; 
            }
            return $rows;
        }
        
    }
?>