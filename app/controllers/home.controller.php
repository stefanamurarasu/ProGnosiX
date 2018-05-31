<?php
    session_start();

    switch ($_SERVER['REQUEST_METHOD']) { 
        case "GET":
            include_once "../models/course.model.php";

            $courses = Courses::getCourses();

    }
?>