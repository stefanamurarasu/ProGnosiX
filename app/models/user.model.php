<?php
    include "../config.php";
    
    // creeaza conexiunea la BD
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

    class User {
        private $isLogged;
        private $courses;

        public function __construct($token) {
            $this -> courses = [];

            $usernameSql = "SELECT username from token WHERE session_token = '{$token}'";
            $usernameResult =  $conn ->query($usernameSql);

            if($usernameResult -> num_rows === 0) {
                $username = NULL;
                $this -> isLogged = FALSE;
            } else {
                $username = $usernameResult -> fetch_assoc()["username"];
                $this -> isLogged = TRUE;
            }

            $coursesSql = '
                        SELECT course_name FROM course AS c, student AS s
                        WHERE s.username = "' . $username . '"
                        AND c.year = s.year
                ';

            $result = $conn->query($coursesSql);

            while($row = $result->fetch_assoc()) {
                $this -> courses[] = $row["course_name"];
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