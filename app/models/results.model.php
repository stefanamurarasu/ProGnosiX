<?php

include "../config.php";

//creeaza conexiunea la baza de date

$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

//clasa pentru perioada in care sunt active rundele
class Result {
    static function insertResults($year, $filepath, $groupNb, $course_id, $description, $eval_type){
        global $conn;

        $sql = "INSERT INTO result (course_year, filepath, group_number, course_id, result_description, eval_type) VALUES ('{$year}', '{$filepath}', '{$groupNb}', '{$course_id}', '{$description}', '{$eval_type}')";

        $conn->query($sql);
        return 1;
    }

}