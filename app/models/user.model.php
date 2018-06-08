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
            $usernameResult =  $conn->query($usernameSql);

            if($usernameResult -> num_rows === 0) {
                $username = NULL;
                $this -> isLogged = FALSE;
            } else {
                $username = $usernameResult -> fetch_assoc()["username"];
                $this -> isLogged = TRUE;
            }

            // anul userului
            $yearSql = 'SELECT year FROM student WHERE username = "' . $username . '" ';
            $yearResult =  $conn->query($yearSql);

            $year =  $yearResult -> fetch_assoc()["year"];
            //$year = mysqli_fetch_assoc($yearResult);
            //echo $year;

            if ($this -> isLogged == TRUE ){
                $coursesSql = '
                            SELECT ID, course_name FROM course
                            WHERE year = ' . $year ;

                $result = $conn -> query($coursesSql);
                
                while($row = $result -> fetch_assoc()) {
                    //$this -> courses[] = $row["course_name"];
                    $this -> courses[$row['ID']] = $row['course_name'];
                }
            }
        }

        // cursurile userului
        public function getCourses() {
            return $this -> courses;
        }

        public function isLogged() {
            return $this -> isLogged;
        }

    }

?>