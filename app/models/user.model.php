<?php
    include "../config.php";
    
    // creeaza conexiunea la BD
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

    class User {
        private $isLogged;
        private $courses;
        private $year;
        private $registrationNb;
        private $username;

        public function __construct($token) {
            global $conn;
            $this -> courses = [];

            $usernameSql = "SELECT username FROM token WHERE session_token = '".$token."' ";
            $usernameResult =  $conn->query($usernameSql);

            if($usernameResult -> num_rows === 0) {
                $this -> username = NULL;
                $this -> isLogged = FALSE;
            } else {
                $this -> username = $usernameResult -> fetch_assoc()["username"];
                $this -> isLogged = TRUE;
            }

            // anul userului
            $yearSql = 'SELECT year FROM student WHERE username = "' . $this -> username . '" ';
            $yearResult =  $conn->query($yearSql);

            $this -> year =  $yearResult -> fetch_assoc()["year"];
            //$year = mysqli_fetch_assoc($yearResult);
            //echo $year;

            if ($this -> isLogged == TRUE ){
                $coursesSql = '
                            SELECT ID, course_name FROM course
                            WHERE year = ' . $this -> year ;

                $result = $conn -> query($coursesSql);
                
                while($row = $result -> fetch_assoc()) {
                    //$this -> courses[] = $row["course_name"];
                    $this -> courses[$row['ID']] = $row['course_name'];
                }
            }
        }

        static function makePrediction($grade, $registrationNb, $round_ID,  $courseID, $evalType){
            global $conn;

            $sql = "SELECT choose_grade FROM prediction 
                    WHERE registration_number='{$registrationNb}' 
                    AND round_ID='{$round_ID}'";

            $result = $conn->query($sql);

            if ($result->num_rows === 0) {
                $gradeSql = "INSERT INTO prediction (choose_grade, registration_number, round_ID, course_ID, evaluation_type) VALUES ('{$grade}', '{$registrationNb}', '{$round_ID}', '{$courseID}', '{$evalType}')";
                $conn->query($gradeSql);
                return TRUE;
                
            } else {
                return FALSE;
            }
        }

        public function getRegistrationNb($username){
            global $conn; 

            $sql = "SELECT registration_number FROM student WHERE username='{$username}'";
            $nbResult = $conn->query($sql);
            $this -> registrationNb = $nbResult -> fetch_assoc()["registration_number"];

            return $this -> registrationNb;
        }

        // cursurile userului
        public function getCourses() {
            return $this -> courses;
        }

        public function isLogged() {
            return $this -> isLogged;
        }

        public function getYear(){
            return $this -> year;
        }

        public function getUsername(){
            return $this -> username;
        }

    }

?>