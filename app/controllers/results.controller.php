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
                include_once "../views/admin.view.php";
            } else {
                header("Location: ../views/login_failed.view.html");
            }
            break;

           if(isset($_SESSION["results_worked"])){
                unset($_SESSION["results_worked"]);
                header("Location: ../views/admin.view.php");

           } else if (isset($_SESSION["activate_failed"])){

               unset($_SESSION["activate_failed"]);
               header("Location: ../views/round_failed.view.html");

           } else {
               include_once "../views/login_failed.view.html";
           }
           break;

        case "POST":

           include_once "../models/results.model.php";
           include_once "../models/auth.model.php";

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

           if ( isset($_POST["submit_file"]) ){
                $year = isset($_POST['selectYear']) ? $_POST['selectYear'] : false;
                $groupNb = isset($_POST['selectGroupNb']) ? $_POST['selectGroupNb'] : false;
                $course = isset($_POST['selectCourse']) ? $_POST['selectCourse'] : false;
                $type = isset($_POST['selectType']) ? $_POST['selectType'] : false;
                $resultDescription = isset($_POST['result']) ? $_POST['result'] : false;
                $filepath =  $target_file;

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }


                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                        echo "Sorry, there was an error uploading your file.";
                }

                $result = Result :: insertResults($year,  $filepath, $groupNb, $course, $resultDescription, $type);
                
                if ($result){
                    $_SESSION["results_worked"] = TRUE;
                    header("Location: ../views/admin.view.php");
                } else {
                    $_SESSION["results_failed"] = TRUE;
                    header("Location: ../views/round_failed.view.html");
                }
           }

           if(isset($_POST["logout_user"])) {
                Auth::logout();
                header("Location: ../views/404.view.html");
            }

            break;

        default:
            break;
    }

?>
    