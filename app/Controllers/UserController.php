<?php
    //include "app/config/Connect.php";

    Class UserController{
        
        public function login($email, $passwd){
            //
            $conn = new mysqli("localhost", "root", "", "sigenv");
            $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? && password = ?");
            $stmt->bind_param("ss", $email, $passwd);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['category'] = $user['category'];
                return true;
            }
            else{
                echo "Something went wrong";
                //return false;
            }
    
        }
        public function signin($name, $surname, $email, $passwd){
            //
            if($this->login($email, $passwd)){
                echo "ja exite";
            }
            else{
                $conn = new mysqli("localhost", "root", "", "sigenv");
                $stmt = $conn->prepare("INSERT INTO user(name, surname, category, email, password) VALUES(?, ?, 'Estudante', ?, ?)");
                $stmt->bind_param("ssss", $name, $surname, $email, $passwd);

                if($stmt->execute()){
                    return true;
                }
                else{
                    echo "something went wrong";
                }
            }
            
        }
    }
?>