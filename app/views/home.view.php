<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProGnosiX | Home</title>
    <link rel="stylesheet" href="../../public/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<body>
<?php 
        include "../controllers/home.controller.php";
    $myfile = fopen("rss.xml", "w");
    $txt = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">
<channel>
<atom:link href=\"http://localhost:1234/ultima-ultima-versiune/app/views/rss.xml\" rel=\"self\" type=\"application/rss+xml\" />
<title>Noutati RSS Feed</title>
<link>http://localhost:1234/ultima-ultima-versiune/app/views/login.view.php</link>
<description>Noutati</description>\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    ?>
    <header class="header neutral" id="header">
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
    </header>
    <hr class="hr-dashed">

    <!-- Meniul materiilor -->
    <?php 

        echo '<div id="navMenu" class="sidenav"
                <a href="javascript:void(0)" class="closebtn" onclick="toggleNav()">&times;</a>';
        foreach($courses as $key=>$value){
            echo '<a href="./course.view.php?' . $key. ' " id=' . $key . ' >' . $value . '</a>';
        }

        echo '</div>';

    ?>
    <!-- Main content -->
    <div id="content" class="main-content">
        <span class="burger-menu" onclick="toggleNav()">&#9776;</span>

        <!-- News -->
        <div class="news-section">
            <?php
            $myfile = fopen("rss.xml", "a");
            
            foreach($courses as $key=>$value){
                echo '<div class="clear news-item paragraph-padding-64">
                        <div class="position-paragraph pg-container">
                            <h1 class="txt-color">'.$value.'</h1>'; 
                $result = Announcements::getDescription($key);
                echo '<p>'. $result.'</p>';
                echo  '<span>
                            <a class="link-style" href="../views/course.view.php?'.$key.'">Vezi pagina materiei&#8594;</a>
                       </span>';

                $roundId = Round:: getIdRound($key, 'lab');
                $date = Round:: getRoundDate($roundId);

                // counter
                echo '<script>
                var countDownDate = new Date(" '. $date . ' 12:00:00").getTime();

                var countdownfunction = setInterval(function() {
                    
                    var now = new Date().getTime();
                    
                    var distance = countDownDate - now;
                    
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                    + minutes + "m " + seconds + "s ";
                    
                    if (distance < 0) {
                        clearInterval(countdownfunction);
                        document.getElementById("demo").innerHTML = "EXPIRED";
                    }
                }, 1000);
                </script>';
                // counter
                
                echo '<div class="position-details pg-details">
                        <p class="test pg-border pg-padding-large pg-padding-32 to-align">Timp rămas: <a style="color:white" id="demo" class="counter"></a></p>
                      </div>
                      </div>
                      </div>';

                // rss feed
                    $text = "<item>\n <title>". $value ."</title>\n <link>http://localhost:1234/ultima-ultima-versiune/app/views/course.view.php?".$key."</link>\n";
                    fwrite($myfile, $text);
                    $guid = " <guid>http://localhost:1234/ultima-ultima-versiune/app/views/course.view.php?".$key."</guid>\n";
                    fwrite($myfile, $guid);
                    $description = " <description>".$result."</description>\n";
                    fwrite($myfile, $description);
                    $endItem = "</item>\n";
                    fwrite($myfile, $endItem);

                //rss feed
            }
            $final = "</channel>\n</rss>";
            fwrite($myfile, $final);
            fclose($myfile);
            ?>
        </div>
        <!-- /News -->
        

        <!-- Informations -->
        <div class="info-section paragraph-padding-64">

            <!-- Tags -->
            <div class="info-item tags-section white-content">
                <div class="tags-content">
                    <h4>Tags</h4>
                </div>
                <div class="text-tags white-content">
                    <p>
                        <span class="dark-content tag-item tag-margin">TW</span>
                        <span class="grey-content tag-item tag-margin tag-small-size">PA</span>
                        <span class="grey-content tag-item tag-margin tag-small-size">IP</span>
                        <span class="grey-content tag-item tag-margin tag-small-size">ENGL</span>
                        <span class="grey-content tag-item tag-margin tag-small-size">MT</span>
                        <span class="grey-content tag-item tag-margin tag-small-size">SD</span>
                    </p>
                </div>
                <!-- /Tags -->
            </div>

            <!-- RSS Feed Section -->
            <div class="rss-section white-content">
                <div class="tags-content">
                    <h4>RSS FEED</h4>
                </div>
                <div class="text-tags white-content">
                    <ul>
                        <li class="rss-image">
                            <a class="rss-subtext" href="./rss.xml" title="Subscribe to RSS Feed">RSS Feed</a>
                        </li>
                    </ul>
                </div>
                <!-- RSS Feed Section -->
            </div>

            <!-- Subscribe Section -->
            <!-- <div class="subscribe-section white-content">
                <div class="tags-content">
                    <h4>Subscribe</h4>
                </div>
                <div class="clear text-tags white-content">
                    <p>
                        Introduceți e-mailul pentru a primi notificări
                        <br> despre ultimele postări de pe aplicație.
                    </p>
                    <input class="sub-input" type="text" placeholder="E-mail..." style="width:100%">
                    <button type="button" onclick="document.getElementById('subscribe').style.display='block'" class="button-sub">Subscribe</button>
                </div>
                <!-- Subscribe Section -->
            
            <!-- /Informations -->
        </div>

        <!-- Pagination -->
        <!-- <div class="pagination">
            <div class="pag-numbers">
                <a class="button button-black" href="#">1</a>
                <a class="button button-black-hover" href="#">2</a>
                <a class="button button-black-hover" href="#">3</a>
                <a class="button button-black-hover" href="#">»</a>
            </div>
        </div> -->
        <!-- /Main content -->
    </div>
    <footer class="footer dark-content" id="footer">
        &copy; ProGnosiX Team 2018
    </footer>

    <script src="../../public/sidemenu.js"></script>

   
</body>
</html>