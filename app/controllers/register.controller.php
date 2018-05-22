<?php
    session_start();

    switch ($_SERVER['REQUEST_METHOD']){
        case "GET":
           if(isset($_SESSION["token"])){
               header("Location: ../views/home.views.html");
            } else if(isset($_SESSION["register_failed"])){
                unset($_SESSION["register_failed"]); 
                header("Location: /"); //?
            } else{
                include_once "../views/register.views.html"; //?
            }
            break;
        case "POST":
           include_once "../models/auth.model.php";

           if(isset($_POST["cancel_register"])){
                header("Location: /");
            } else if(isset($_POST["submit_register"])){
               $registerToken = Auth::register($_POST["nr_matricol"], $_POST["nume"], $_POST["prenume"], $_POST["username"], $_POST["parola"], $_POST["repeat_parola"], $_POST["email"]);

               if($registerToken) {
                $_SESSION["token"] = $registerToken;
                header("Location: ../views/home.views.html");
            } else {
                $_SESSION["register_failed"] = TRUE;
                header("Location: /");
            }
        }
        break;
    default:
        break;
    }
?>