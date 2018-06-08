<?php

include "../config.php";

//creeaza conexiunea la baza de date

$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

//clasa pentru perioada in care sunt active rundele

class Round {

    static function checkRound($year, $course_id, $start_time, $end_time){
        global $conn;
        
        $sql = "SELECT 'round' FROM `round` WHERE 'round'='{$round}'";
        
        $result = $conn->query($sql);
        $isActive = $result -> fetch_assoc () ["round"]; 

        //verifica daca runda este activa

        if($isActive === 1 ) {
            return FALSE;
        } else {
            $checkRound = "INSERT INTO `round` (year, round, course_id, start_time, end_time) VALUES ('{$year}', '{$round}', '{$course_id}', '{$start_time}', '{$end_time}')";
            $conn->query($checkRound);
        }
            

        return $checkRound;
    } 
}


?>

