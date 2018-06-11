<?php

include "../config.php";

//creeaza conexiunea la baza de date

$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

class Announcements{

    static function getDescription($course_id){
        global $conn;

        $sql = "SELECT result_description FROM rounds WHERE course_id = '". $course_id ."'";

        $result = $conn->query($sql);

        $round_description =  $result -> fetch_assoc()["result_description"]; 

        return $round_description;
    }

   


}