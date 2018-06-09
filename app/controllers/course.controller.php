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

            } elseif (isset($_POST["submit_grade_lab"])){
                //nota aleasa
                $value = $_POST["radio"]; 

                $username = $loggedUser -> getUsername();
                $regNumber = $loggedUser -> getRegistrationNb($username);

                // echo $_SESSION['courseID'];
                $roundID = Round :: getIdRound($_SESSION['courseID'], 'course');
                User::makePrediction($value, $regNumber, $roundID, $_SESSION['courseID'], 'course');
            }




            // if(!isset($_SESSION["token"])) {
            //     $loggedUser = new User(NULL);
            // } else {
            //     $loggedUser = new User($_SESSION["token"]);
            // }

            // $courses = $loggedUser -> getCourses();

            // $username = $loggedUser -> getUsername();
            // $regNumber = $loggedUser -> getRegistrationNb($username);

            // $courseID = 0;

            // //pentru a stabili pagina de curs accesata
            // foreach($courses as $key=>$value){
            //     global $courseID;
            //     if(isset($_GET[$key])){
            //         //echo '<p>' . $courseName . '</p>';
            //         $courseID = $key;
            //         break;
            //     }
            // }

            // if (isset($_POST["lab"])){
            //     $round_type = 'lab';
            // } elseif(isset($_POST["course"])) {
            //     $round_type = 'course';
            // }

            // $roundID = Round :: getIdRound($courseID, 'lab');
            // if(isset($_POST["submit_grade_lab"])) {
            //     $value = $_POST["radio"];
            //     User::makePrediction($value, $regNumber, $roundID, $courseID, 'lab');
            //     header("Location: ../views/home.view.html");
            // }
            // break;

        default:
            break;
    }

?>    