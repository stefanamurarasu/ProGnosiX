<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProGnosiX|Profile</title>
    <link rel="stylesheet" href="../../public/hfsm-style.css">
    <link rel="stylesheet" href="../../public/profile.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>

<body>
    <?php include "../controllers/profile.controller.php";?>
    <div class="header neutral" id="header">
        <div class="logo">
            <a href="./login.view.html">ProGnosiX</a>
        </div>
        <div class="header-right">
            <span class="make-me-inline">Hello,
                <a href="./profile.view.php">
                    <img src="../../public/images/user-icon.png" alt="User icon" class="user-icon">
                </a>
            </span>
            <form action="../controllers/course.controller.php" method="POST">
                <div class="form make-me-inline">
                    <input class="logout-btn" type="submit" value="Logout" name="logout_user">
                </div>
            </form>
        </div>
    </div>
<!-- Meniul materiilor -->
<?php 
    
    echo '<div id="navMenu" class="sidenav"
            <a href="javascript:void(0)" class="closebtn" onclick="toggleNav()">&times;</a>';
    foreach($courses as $key=>$value){
        echo '<a href="./course.view.php?' . $key. ' " id=' . $key . ' >' . $value . '</a>';
    }
    echo '</div>';
?>

    <div id="content" class="pgx-content">
        <hr class="hr-dashed">
        <span class="burger-menu" onclick="toggleNav()">&#9776;</span>

        <span class="pgx-form">
                <div class="pgx-avatar">
                    <?php echo '<img src="../controllers/'. $photoPath  .'" alt="User Image">';?>
                </div>
                <div class="details">
                    <h1><?php echo $name; ?></h1>
                    <p>Username: <?php echo $username; ?></p>
                    <form action="../controllers/profile.controller.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="imageToUpload" id="fileToUpload">
                        <input type="submit" value="Upload" name="submit_image">
                    </form>
            </div>
        </span>
        <hr class="hr-dashed">
    </div>

     <div class="final-grades" id="timeline">
    <?php foreach($courses as $key=>$value){
        $int = (int)$key;

        if ($int % 2 == 0){
            echo '<div class="name right">
                    <div class="content">
                        <h2>'. $value .'</h2>
                        <h3>Nota obținută: 5</h3>
                        <h3>Procentaj: +0.7p</h3>
                        <h3>Nota finală: 8</h3>
                    </div>
                </div>';
        } else {
            echo '<div class="name left">
                    <div class="content">
                        <h2>'. $value .'</h2>
                        <h3>Nota obținută: 5</h3>
                        <h3>Procentaj: +0.7p</h3>
                        <h3>Nota finală: 8</h3>
                    </div>
                </div>';
        }
        }?>
  </div>
    <footer class="footer" id="footer">
        &copy; ProGnosiX Team 2018
    </footer>

    <script src="../../public/sidemenu.js"></script>
</body>

</html>