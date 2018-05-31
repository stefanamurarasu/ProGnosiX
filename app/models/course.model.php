<?php
    include "../config.php";
    
    // creeaza conexiunea la BD
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

    //clasa pentru materiile pe care le are utilizatorul
    class Courses {
        static function getCourses() {
            global $conn;

            $sql = "SELECT course_name FROM course WHERE year = 2";
            
            $result = $conn->query($sql);
            $courses = [];

            while($row = $result->fetch_assoc()) {
                $courses[] = $row["course_name"];
            }

            return $courses;
        }
    }

?>