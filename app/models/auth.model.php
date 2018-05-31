<?php
    include "../config.php";
    
    // creeaza coneziunea la BD
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

    class Auth{

        static function register($registration_nb, $last_name, $first_name, $year, $username, $password, $repeat_password, $email){
            global $conn;

            $sql = "SELECT registration_number FROM student WHERE registration_number='{$registration_nb}'";
            $result = $conn->query($sql);

            //verifica sa nu fie deja inregistrat
            if ($result->num_rows > 0) {
                return FALSE;

            //daca nu are deja cont
            } else {
                
                if($password == $repeat_password){
                    
                //asigneaza un token
                $token = bin2hex(openssl_random_pseudo_bytes(30));
                $tokenSql = "INSERT INTO token (session_token, username) VALUES ('{$token}', '{$username}')";
                $conn->query($tokenSql);

                //INSERT in BD cu datele introduse in form
                $dataToInsert = "INSERT INTO student (registration_number, last_name, first_name, year, username, psw, repeat_password, email) VALUES ('{$registration_nb}', '{$last_name}', '{$first_name}', '{$year}', '{$username}', '{$password}', '{$repeat_password}', '{$email}')";
                $conn->query($dataToInsert);
                return $token;
            }
        }
    }

        static function login($username, $password){
            global $conn;

            $sql = "SELECT username, psw FROM student WHERE username='{$username}' AND psw='{$password}'";
            $result = $conn->query($sql);

            if($result->num_rows === 0){
                return FALSE;
            
            } else {

                $token = bin2hex(openssl_random_pseudo_bytes(30));
                $tokenSql = "INSERT INTO token (session_token, username) VALUES ('{$token}', '{$username}')";
                $conn->query($tokenSql);

                return $token;
            }
        }
        
        static function logout() {
            session_start();
            unset($_SESSION);
            session_destroy();
            session_write_close();
        }

    }

?>