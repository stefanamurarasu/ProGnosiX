<?php
    session_start();

    switch($_SERVER['REQUEST_METHOD']){
        case "GET":
           if(isset($_SESSION["activateRound"])){
               header("Lacation: ../views/activate_round.view.html");
           } else if(isset($_SESSION["activateRound_failed"])){
               unset($_SESSION["activateRound_failed"]);
               header("Location: ../views/login_failed.view.html");
           } else{
               include_once "../views/login_failed.view.html";
           }
           break;

        case "POST":
           include_once "../models/round.model.php";

           if(isset($_POST["activate_round"])){
               $round = Round::checkRound($_POST["selectYear"], $_POST["selectCourse"], $_POST["start_time"], $_POST["end_time"]);

               if($round){
                   $_SESSION["activateRound"] = $round;
                   //header("Location: ../views/activate_round.view.html");
               } else{
                   $_SESSION["activateRound_failed"] = TRUE;
                   //header("Location: ../views/login_failed.view.html");
               }

            }
        break;
    default:
        break;
    }

?>
    