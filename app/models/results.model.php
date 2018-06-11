<?php

include "../config.php";

//creeaza conexiunea la baza de date

$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

//clasa pentru perioada in care sunt active rundele
class Result {
    static function insertResults($year, $filepath, $groupNb, $semian, $course_id){
        global $conn;

        $sql = "INSERT INTO result (course_year, filepath, group_number, semian, course_id) VALUES ('{$year}', '{$filepath}', '{$groupNb}', '{$semian}', '{$course_id}')";

        $conn->query($sql);
        return 1;
    }

}