<?php
     session_start();

    switch ($_SERVER['REQUEST_METHOD']) { 
        case "GET":
            include_once "../models/user.model.php";
            include_once "../models/course.model.php";
            include_once "../models/home.model.php";
            include_once "../models/round.model.php";


            if(!isset($_SESSION["token"])) {
                $loggedUser = new User(NULL);
            } else {
                $loggedUser = new User($_SESSION["token"]);
            }

            $courses = $loggedUser -> getCourses();

            if($loggedUser -> isLogged()) {
                include_once "../views/home.view.php";
            } else {
                header("Location: ../views/login_failed.view.html"); //aici ar trebui un mesaj de eroare pe pagina curenta
            }
            break;

        case "POST":
            include_once "../models/auth.model.php";

            if(isset($_POST["logout_user"])) {
                Auth::logout();
                header("Location: ../views/login.view.html");
            }

        default:
            break;

    }
?>