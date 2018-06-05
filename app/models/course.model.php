<?php
    include "../config.php";
    
    // creeaza conexiunea la BD
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

    //clasa pentru materiile pe care le are utilizatorul
    class Courses {
        
        static function getCourses() {
            global $conn;

            $sql = "SELECT ID, course_name FROM course";
            
            $result = $conn->query($sql);
            $courses = [];

            //dictionar ID curs => nume curs; id'ul va fi folosit la preluarea cursului
            while($row = $result->fetch_assoc()) {
                $courses[$row['ID']] = $row['course_name'];
                
            }

            return $courses;
        }
    }

?>