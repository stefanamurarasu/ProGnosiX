<?php
    session_start();

    switch ($_SERVER['REQUEST_METHOD']){
        case "GET":
           if(isset($_SESSION["token"])){
               header("Location: ../views/home.views.html");
            } else if(isset($_SESSION["login_failed"])){
                unset($_SESSION["login_failed"]); 
                include_once "../views/login_failed.views.html";
            } else{
                include_once "../views/login.views.html";
            }
            break;
        case "POST":
           include_once "../models/auth.model.php";

           if(isset($_POST["submit_login"])){
               $loginToken = Auth::login($_POST["username"], $_POST["password"]);

               if($loginToken) {
                $_SESSION["token"] = $loginToken;
                header("Location: ../views/home.views.html");
            } else {
                $_SESSION["login_failed"] = TRUE;
                header("Location: /");
            }
        }
        break;
    default:
        break;
    }
?>