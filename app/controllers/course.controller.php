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
            include_once "../models/round.model.php";
            include_once "../models/user.model.php";

            if(isset($_POST["logout_user"])) {
                Auth::logout();
                header("Location: ../views/login.view.html");
            }


            // date pentru alegerea notei
            if(!isset($_SESSION["token"])) {
                $loggedUser = new User(NULL);
            } else {
                $loggedUser = new User($_SESSION["token"]);
            }

            // //pentru a stabili materia accesata

            if(isset($_POST["submit_grade_lab"])) {
                //nota aleasa
                $value = $_POST["radio"]; 

                $username = $loggedUser -> getUsername();
                $regNumber = $loggedUser -> getRegistrationNb($username);

                // echo $_SESSION['courseID'];
                $roundID = Round :: getIdRound($_SESSION['courseID'], 'lab');
                User::makePrediction($value, $regNumber, $roundID, $_SESSION['courseID'], 'lab');
                header("Location: ../views/home.view.php");

            } elseif (isset($_POST["submit_grade_course"])){
                //nota aleasa
                $value = $_POST["radio"]; 

                $username = $loggedUser -> getUsername();
                $regNumber = $loggedUser -> getRegistrationNb($username);

                // echo $_SESSION['courseID'];
                $roundID = Round :: getIdRound($_SESSION['courseID'], 'course');
                User::makePrediction($value, $regNumber, $roundID, $_SESSION['courseID'], 'course');
                header("Location: ../views/home.view.php");
            }

        default:
            break;
    }

?>    