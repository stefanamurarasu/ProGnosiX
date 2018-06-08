<?php
     session_start();

    switch ($_SERVER['REQUEST_METHOD']) { 
        case "GET":
            include_once "../models/user.model.php";
            include_once "../models/course.model.php";

            if(!isset($_SESSION["token"])) {
                $loggedUser = new User(NULL);
            } else {
                $loggedUser = new User($_SESSION["token"]);
            }

            if($loggedUser -> isLogged()) {
                include_once "../views/home.view.php";
            } else {
                include_once "../views/login_failed.view.html";
            }
            break;

        default:
            break;

    }
?>