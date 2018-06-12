<?php

include "../config.php";

//creeaza conexiunea la baza de date

$conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

//clasa pentru perioada in care sunt active rundele
class Result {

    static function insertResults($year, $filepath, $csv_path, $pdf_path, $groupNb, $course_id, $description, $eval_type){
        global $conn;

        $sql = "INSERT INTO result (course_year, filepath, csv_path, pdf_path, group_number, course_id, result_description, eval_type) VALUES ('{$year}', '{$filepath}', '{$csv_path}', '{$pdf_path}', '{$groupNb}', '{$course_id}', '{$description}', '{$eval_type}')";

        $conn->query($sql);
        return 1;
    }

    static function getFilePath($year, $course_id, $eval_type){
        global $conn;
        $sql = "SELECT filepath FROM result WHERE course_id = '". $course_id ."' AND course_year = '". $year ."' AND eval_type = '". $eval_type ."'";

        $result = $conn->query($sql);
        $filepath =  $result -> fetch_assoc()["filepath"];

        return $filepath;
    }

    static function getCSVPath($year, $course_id, $eval_type){
        global $conn;
        $sql = "SELECT csv_path FROM result WHERE course_id = '". $course_id ."' AND course_year = '". $year ."' AND eval_type = '". $eval_type ."'";

        $result = $conn->query($sql);
        $filepath =  $result -> fetch_assoc()["csv_path"];

        return $filepath;
    }

    static function getPDFPath($year, $course_id, $eval_type){
        global $conn;
        $sql = "SELECT pdf_path FROM result WHERE course_id = '". $course_id ."' AND course_year = '". $year ."' AND eval_type = '". $eval_type ."'";

        $result = $conn->query($sql);
        $filepath =  $result -> fetch_assoc()["pdf_path"];

        return $filepath;
    }

}