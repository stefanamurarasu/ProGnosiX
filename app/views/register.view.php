<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProGnosiX</title>
    <link rel="stylesheet" href="../../public/login.css">
    <link rel="stylesheet" href="../../public/register.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<body>

    <!-- Header -->
    <header class="header">
        <h1 class="to-align">
            <b>Welcome to
                <a href="./login.view.html">
                    <span class="logo">ProGnosiX</span>
                </a>
            </b>
        </h1>
    </header>

    <!-- Register section -->
    <div class="register-section">
        <form action="../controllers/register.controller.php" method="POST" class="container">
            <h1>Cont nou</h1>
            <p>Vă rugăm să completați toate câmpurile pentru a crea un cont nou.</p>
            <hr>

            <label>
                <b>Nume</b>
            </label>
            <input type="text" placeholder="Introduceți numele" name="nume" required>

            <label>
                <b>Prenume</b>
            </label>
            <input type="text" placeholder="Introduceți prenumele" name="prenume" required>

            <label>
                <b>An de studiu</b>
            </label>
            <input type="text" placeholder="Introduceți anul de studiu" name="an" required>

            <label>
                <b>Număr matricol</b>
            </label>
            <input type="text" placeholder="Introduceți numărul matricol" name="nr_matricol" required>

            <label>
                <b>Nume de utilizator</b>
            </label>
            <input type="text" placeholder="Nume de utilizator" name="username" required>
            
            <label>
                <b>Parolă</b>
            </label>
            <input type="password" minlength="8" placeholder="Introduceți parola" name="parola" id="parola" required>

            <label>
                <b>Verificare parolă</b>
            </label>
            <input type="password" minlength="8" placeholder="Reintroduceți parola" name="repeat_parola" id="confirmare_parola" required>

            <label>
                <b>E-mail</b>
            </label>
            <input type="text" placeholder="Introduceți E-mail" name="email" required>
            
            <div class="clearfix">
                <a href='../views/login.view.html'>
                    <button type="button" class="cancelbtn" name="cancel_register">Anulează</button>
                </a>
                <button type="submit" class="signupbtn" name="submit_register">Înregistrează-te</button>
            </div>
            <p style="font-size: 24;"> <?php session_start();  echo isset($_SESSION["errorMessage"])? $_SESSION["errorMessage"]:''; session_destroy();?></p>
        </form>
    </div>

    <!-- Contact section -->
    <div class="contact">
        <h3 class="to-align">CONTACT</h3>
        <div class="contact-info-left margin-top">

            <div>
                <div class="team-member">
                    <img src="../../public/images/codruta.png" class="potato-head">
                    <p class="to-align">Codruța</p>
                </div>
                <div class="team-member">
                    <img src="../../public/images/raluca.png" class="potato-head">
                    <p class="to-align">Raluca</p>
                </div>
            </div>

            <ul class="pad-left">
                <li class="check-in-icon">
                    <i class="info to-align large"></i>Iași, RO</li>
                <li class="phone-icon">
                    <i class="info to-align large"></i>Phone: 0748 022 866</li>
                <li class="mail-icon">
                    <i class="info to-align large"></i>Email: prognosix@gmail.com
                </li>
            </ul>
        </div>

        <!-- Google Map -->
        <div id="google-map" class="g-map margin-top"></div>
    </div>

    <script src="../../public/validate_password.js"></script>
    <script src="../../public/google_maps.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5WeMOGA2ezX4oAVZBatY-R9R52Gc9QnA&callback=myMap"></script>

    <footer class="footer" id="footer">
        &copy; ProGnosiX Team 2018
    </footer>

</body>

</html>