<?php

session_start();
$_SESSION['message'] = '';

$servername = "localhost";
$username = "root";
$password = "";
$db = 'prognosix';

$connection = new mysqli($servername, $username, $password) or die(mysqli_error());
$select_db = mysqli_select_db($connection, $db) or die("Conectarea la baza de date nu se poate efectua!");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if (isset($_POST["submit_login"])){

        if(!empty($_POST['username']) && !empty($_POST['psw'])){

            $username = $_POST['username'];
            $psw = $_POST['psw'];

                $_SESSION['username'] = $username;

                $sql = mysqli_query($connection,"SELECT * FROM studenti WHERE psw='".$psw."' AND username='".$username."'");

                $result = mysqli_num_rows($sql);

                if($result != 0){
                    while($row = mysqli_fetch_assoc($sql)){
                        $databaseusername=$row['username'];
                        $databasepassword=$row['psw'];
                    }
                    if($username == $databaseusername && $psw == $databasepassword){
                       ?>
                        <script>alert("V-ați conectat la contul dumneavoastra cu succes!");</script>
                       <?php
                       header("Refresh: 1; url=materii.html");
                    }
                }
                else {
                       ?>
                        <script>alert("Ne pare rau, dar parola sau numele de utilizator sunt incorecte! încercați din nou!");</script>
                       <?php
                       header("Refresh: 1; url=index.html");
                }
        }
    else{
        $SESSION['message'] = 'Session Registration Failed!';
        }   
    }
}
?>
