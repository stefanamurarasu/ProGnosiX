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

            $courses = $loggedUser -> getCourses();


            if($loggedUser -> isLogged()) {
                include_once "../views/course.view.php";
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

            $username = $loggedUser -> getUsername();
            $regNumber = $loggedUser -> getRegistrationNb($username);

            // if(isset($_POST["submit_grade"])) {
            //     User::makePrediction($_POST["radio"]);
            //     header("Location: ../");
            // }

            break;

        default:
            break;
    }

?>    