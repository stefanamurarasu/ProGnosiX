<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = 'prognosix';

$con = new mysqli($servername, $username, $password) or die(mysqli_error());
$select_db = mysqli_select_db($con, $db) or die("Conectarea la baza de date nu se poate efectua!");


if (isset($_POST["submit"])) {
    if (!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['username']) && !empty($_POST['psw']) && !empty($_POST['pswRepeat']) && !empty($_POST['email']) && !empty($_POST['address'])) {
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $username = $_POST['username'];
        $psw = $_POST['psw'];
        $pswRepeat = $_POST['pswRepeat'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        

        $db = mysqli_query($con, "SELECT * FROM register WHERE email='" . $email . "' OR username='" . $username . "'");
        $num_rows = mysqli_num_rows($db);
        

        if ($num_rows == 0) {
            $sql = "INSERT INTO register(lastName, firstName, username, psw, pswRepeat, email, address) VALUES ('$lastName', '$firstName', '$username', '$psw', '$pswRepeat', '$email', '$address')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                ?>
                <script type="text/javascript">
                    alert('Contul dumneavoastra a fost creat cu succes!');
                </script>
                <?php
            
                header("refresh:1; url=login.html");

            } else {
                ?>
                <script>alert('Failure! Please try again!');</script>
                <?php
                header("refresh:1; url=login.html");

            }
        }
    }
}
?>