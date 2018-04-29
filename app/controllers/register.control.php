<?php

session_start();
$_SESSION['message'] = '';

$servername = "localhost";
$username = "root";
$password = "";
$db = 'prognosix';

$connection = new mysqli($servername, $username, $password) or die(mysqli_error());
$select_db = mysqli_select_db($connection, $db) or die("Conectarea la baza de date nu se poate efectua!");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    if ($_POST['psw'] == $_POST['pswRepeat']){

         if (isset($_POST["submit"])) {
      
            if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['username']) && !empty($_POST['psw']) && !empty($_POST['pswRepeat']) && !empty($_POST['email'])) {
                
                $lastName = $_POST['lastName'];
                $firstName = $_POST['firstName'];
                $username = $_POST['username'];
                $psw = $_POST['psw'];
                $pswRepeat = $_POST['pswRepeat'];
                $email = $_POST['email'];
                 
                    $_SESSION['username'] = $username;
                        
                    $sql = "INSERT INTO studenti (lastName, firstName, username, psw, pswRepeat, email) VALUES ('$lastName', '$firstName', '$username', '$psw', '$pswRepeat', '$email')";
             
                    $result = mysqli_query($connection, $sql);
            
                    if ($result === true) {
                        ?>
                         <script>alert("V-ați înregistrat cu succes!");</script>
                        <?php
                        header("Refresh: 1; url=profile.html");
                    }
                    else {
                        ?>
                         <script>alert( "Ne pare rau, dar nu v-ați putut înregistra cu succes! încercați din nou!");</script>
                        <?php
                        header("Refresh: 1; url=index.html");
                    }
            }
        else{
            $SESSION['message'] = 'Session Registration Failed!';
            }   
        }
    }
}
?>