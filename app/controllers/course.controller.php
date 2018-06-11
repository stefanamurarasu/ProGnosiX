<?php 
    session_start();

    switch ($_SERVER['REQUEST_METHOD']) {

        case "GET":

            include_once "../models/user.model.php";
            include_once "../models/round.model.php";
            include_once "../models/course.model.php";
            include_once "../models/results.model.php";

            if(!isset($_SESSION["token"])) {
                $loggedUser = new User(NULL);
            } else {
                $loggedUser = new User($_SESSION["token"]);
            }

            // pentru materiile la care este asignat studentul
            // variabila folosita in course.view.php
            $courses = $loggedUser -> getCourses();
            $year = $loggedUser -> getYear();

            if($loggedUser -> isLogged()) {
                include_once "../views/course.view.php";
            } else {
                header("Location: ../views/login_failed.view.html"); 
            }

            break;

        case "POST":

            include_once "../models/auth.model.php";
            include_once "../models/round.model.php";
            include_once "../models/user.model.php";
            include_once "../models/results.model.php";

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

            $courses = $loggedUser -> getCourses();
            $year = $loggedUser -> getYear();

            //pentru a stabili materia accesata
            if(isset($_POST["submit_grade_lab"])) {
                //nota aleasa
                $value = $_POST["radio"]; 

                $username = $loggedUser -> getUsername();
                $regNumber = $loggedUser -> getRegistrationNb($username);

                $roundID = Round :: getIdRound($_SESSION['courseID'], 'lab');
                $prediction = User::makePrediction($value, $regNumber, $roundID, $_SESSION['courseID'], 'lab');
                if ($prediction){
                    $_SESSION['submitGrade'] = TRUE;
                    header("Location: ../views/course.view.php?". $_SESSION['courseKey'] ." " );
                } else {
                    $_SESSION['submitGrade'] = FALSE;
                    header("Location: ../views/course.view.php?". $_SESSION['courseKey'] ." " );   
                }
                

            } elseif (isset($_POST["submit_grade_course"])){
                //nota aleasa
                $value = $_POST["radio"]; 

                $username = $loggedUser -> getUsername();
                $regNumber = $loggedUser -> getRegistrationNb($username);

                // echo $_SESSION['courseID'];
                $roundID = Round :: getIdRound($_SESSION['courseID'], 'course');
                $prediction = User::makePrediction($value, $regNumber, $roundID, $_SESSION['courseID'], 'course');
                
                if ($prediction){
                    $_SESSION['submitGrade'] = TRUE;
                    header("Location: ../views/course.view.php?". $_SESSION['courseKey'] ." " );
                } else {
                    $_SESSION['submitGrade'] = FALSE;
                    header("Location: ../views/course.view.php?". $_SESSION['courseKey'] ." " );
                }
            }

        default:
            break;
    }

?>    