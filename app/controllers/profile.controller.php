<?php
     session_start();

    switch ($_SERVER['REQUEST_METHOD']) { 
        case "GET":
            include_once "../models/user.model.php";
            include_once "../models/course.model.php";
            include_once "../models/round.model.php";
            include_once "../models/user.model.php";


            if(!isset($_SESSION["token"])) {
                $loggedUser = new User(NULL);
            } else {
                $loggedUser = new User($_SESSION["token"]);
            }

            $courses = $loggedUser -> getCourses();
            $username = $loggedUser -> getUsername();
            $name = $loggedUser -> getName();

            $photoPath = $loggedUser -> getPhoto($username);
            

            if($loggedUser -> isLogged()) {
                include_once "../views/profile.view.php";
            } else {
                header("Location: ../views/login_failed.view.html"); 
            }

            break;

        case "POST":

            include_once "../models/auth.model.php";
            include_once "../models/user.model.php";

            if(!isset($_SESSION["token"])) {
                $loggedUser = new User(NULL);
            } else {
                $loggedUser = new User($_SESSION["token"]);
            }
            $username = $loggedUser -> getUsername();

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["imageToUpload"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if ( isset($_POST["submit_image"]) ){
                 // Fisierul exista deja
                 if (file_exists($target_file)) {
                    echo "Fisier existent.";
                    $uploadOk = 0;
                }

                $filepath = $target_file;

                if ($uploadOk == 0) {
                    echo "Fisierul nu poate fi incarcat!";

                } else {
                    move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file); }
                    // echo "Fisierul ". basename( $_FILES["imageToUpload"]["name"]). " a fost incarcat cu succes.";
                    
                    $uploadPhoto = $loggedUser -> uploadPhoto($username, $target_file);
                    // $photoPath = $loggedUser -> getPhoto($username);
                    header("Location: ../views/profile.view.php");
            }

            if(isset($_POST["logout_user"])) {
                Auth::logout();
                header("Location: ../views/login.view.html");
            }

        default:
            break;

    }
?>