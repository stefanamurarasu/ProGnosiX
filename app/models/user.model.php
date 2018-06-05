<?php
    include "../config.php";
    
    // creeaza conexiunea la BD
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

    class User {
        private $isLogged;
        private $courses;
        private $year;

        public function __construct($token) {
            global $conn;
            $this -> courses = [];

            $usernameSql = "SELECT username FROM token WHERE session_token = '".$token."' ";
            echo $usernameSql;
            $usernameResult =  $conn->query($usernameSql);
            // echo $usernameResult;

            $yearSql = "SELECT year FROM student WHERE username = '".$usernameResult."' ";
            
            $yearResult =  $conn->query($yearSql);
            // echo $yearResult;

            if($usernameResult -> num_rows === 0) {
                $username = NULL;
                $this -> isLogged = FALSE;
            } else {
                $username = $usernameResult -> fetch_assoc()["username"];
                $this -> isLogged = TRUE;
            }

            $coursesSql = "
                        SELECT ID, course_name FROM course
                        WHERE year = '".$yearResult."'
                ";

            $result = $conn->query($coursesSql);

            while($row = $result->fetch_assoc()) {
                //$this -> courses[] = $row["course_name"];
                $this -> $courses[$row['ID']] = $row['course_name'];
            }
        }

        public function getCourses() {
            return $this -> courses;
        }

        public function isLogged() {
            return $this -> isLogged;
        }

    }

?>