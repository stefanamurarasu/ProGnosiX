<?php
    session_start();

    switch ($_SERVER['REQUEST_METHOD']){
        case "GET":

           if(isset($_SESSION["token"])){
               header("Location: ../views/home.view.html");
            } else if(isset($_SESSION["login_failed"])){
                unset($_SESSION["login_failed"]); 
                header("Location: ../views/login_failed.view.html");
            } else {
                include_once "../views/login.view.html";
            }
            break;

        case "POST":

           include_once "../models/auth.model.php";

           if(isset($_POST["submit_login"])){
               $loginToken = Auth::login($_POST["username"], $_POST["psw"]);

               if($loginToken) {
                    $_SESSION["token"] = $loginToken;
                    header("Location: ../views/home.view.html");
                } else {
                    $_SESSION["login_failed"] = TRUE;
                    header("Location: ../views/login_failed.view.html");
                }
            }

            break;
        default:
            break;
    }
?>