<?php
    include "../config.php";
    
    // creeaza conexiunea la BD
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

    class Rounds {      
        
        static function isActive($id, $round_type) {
            global $conn;

            if ($round_type === 'lab'){
                $sql = "SELECT round FROM round WHERE course_id = '". $id ."' AND round_type = 0";
            } elseif ($round_type === 'course') {
                $sql = "SELECT round FROM round WHERE course_id = '". $id ."' AND round_type = 1";
            }

            $result = $conn->query($sql);
            $isActive =  $result -> fetch_assoc()["round"];

            return $isActive;
        }

       
    }

?>