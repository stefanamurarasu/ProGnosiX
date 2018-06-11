<?php

include "../config.php";

//creeaza conexiunea la baza de date

$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

//clasa pentru perioada in care sunt active rundele
class Round {

    static function isActive($id, $round_type) {
        global $conn;

        if ($round_type === 'lab'){
            $sql = "SELECT round_status FROM rounds WHERE course_id = '". $id ."' AND round_type = 'lab'";
        } elseif ($round_type === 'course') {
            $sql = "SELECT round_status FROM rounds WHERE course_id = '". $id ."' AND round_type = 'course'";
        }

        $result = $conn->query($sql);
        $isActive =  $result -> fetch_assoc()["round_status"];

        return $isActive;
    }

    static function activateRound($year, $status, $round_type, $start_time, $end_time, $course_id, $result_desciption){
        global $conn;

        if ($round_type === 'lab'){
            $sql = "SELECT ID FROM rounds WHERE course_id = '". $course_id ."' AND round_type = 'lab'";
        } elseif ($round_type === 'course') {
            $sql = "SELECT ID FROM rounds WHERE course_id = '". $course_id ."' AND round_type = 'course'";
        }

        $result = $conn->query($sql);
        $isActive =  $result -> fetch_assoc()["ID"];

        if ($isActive){
            return 0; //runda existenta
        } else {
        $activateSql = "INSERT INTO rounds (course_year, round_status, round_type, start_time, end_time, course_id, result_description) VALUES ('{$year}', '{$status}', '{$round_type}', '{$start_time}', '{$end_time}', '{$course_id}', '{$result_description}'";
            $conn->query($activateSql);
            return 1; 
        }
    }

    static function getIdRound($course_id, $round_type){
        global $conn;

        $sql = "SELECT ID FROM rounds WHERE course_id = '". $course_id ."' AND round_type = '". $round_type ."'";
        $result = $conn->query($sql);

        $roundID =  $result -> fetch_assoc()["ID"];

        return $roundID;
    }

    static function getRoundDate($round_id){
        global $conn;

        $sql = "SELECT end_time FROM rounds WHERE ID = '{$round_id}'";
        $result = $conn->query($sql);

        $date = $result-> fetch_assoc()["end_time"];
        return $date;
        
    }

}
?>

