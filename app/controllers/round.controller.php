<?php
    session_start();

    switch($_SERVER['REQUEST_METHOD']){
        case "GET":
            include_once "../models/user.model.php";

            if(!isset($_SESSION["token"])) {
                $loggedUser = new User(NULL);
            } else {
                $loggedUser = new User($_SESSION["token"]);
            }

            if($loggedUser -> isLogged()) {
                include_once "../views/activate_round.view.php";
            } else {
                header("Location: ../views/login_failed.view.html"); //aici ar trebui un mesaj de eroare pe pagina curenta
            }
            break;

           if(isset($_SESSION["activate_worked"])){
                unset($_SESSION["activate_worked"]);
                header("Location: ../views/activate_round.view.php");

           } else if (isset($_SESSION["activate_failed"])){

               unset($_SESSION["activate_failed"]);
               header("Location: ../views/login_failed.view.html");

           } else {
               include_once "../views/login_failed.view.html";
           }
           break;

        case "POST":

           include_once "../models/round.model.php";
           include_once "../models/auth.model.php";

           if ( isset($_POST["activate_round"]) ){

                $yearOption = isset($_POST['selectYear']) ? $_POST['selectYear'] : false;
                $courseOption = isset($_POST['selectCourse']) ? $_POST['selectCourse'] : false;
                $typeOption = isset($_POST['selectType']) ? $_POST['selectType'] : false;
                $startDate = isset($_POST['start_time']) ? $_POST['start_time'] : false;
                $endDate = isset($_POST['end_time']) ? $_POST['end_time'] : false;
 
                $status = 'yes';
                $result = Round :: activateRound($yearOption, $status, $typeOption, $startDate, $endDate, $courseOption);
                
                if ($result === 0){
                    $_SESSION["activate_failed"] = TRUE;
                    header("Location: ../views/round_failed.view.html");
                    
                } else {
                    $_SESSION["activate_worked"] = TRUE;
                    header("Location: ../views/activate_round.view.php");
                }
           }

           if(isset($_POST["logout_user"])) {

                Auth::logout();
                header("Location: ../views/login.view.html");
            }

            break;

        default:
            break;
    }

?>
    