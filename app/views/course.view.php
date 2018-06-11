<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagina cursului</title>
    <link rel="stylesheet" href="../../public/courses.css">
</head>

<body>
    <?php 
        include "../controllers/course.controller.php";
    ?>
    <header class="header neutral" id="header">
        <div class="logo">
            <a href="./login.view.html">ProGnosiX</a>
        </div>
        <div class="header-right">
            <span class="make-me-inline">Hello,
                <a href="./profile.view.html">
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

        //pentru a stabili pagina de curs accesata
        foreach($courses as $key=>$value){
            if(isset($_GET[$key])){
                //echo '<p>' . $courseName . '</p>';
                $courseName = $value;
                $courseID = $key;
                $_SESSION['courseID'] = $courseID;
                $_SESSION['courseKey'] = $courseID;
                break;
            }
        }

    ?>

    <div id="content" class="main-content">
        <span class="burger-menu" onclick="toggleNav()">&#9776;</span>

        <!-- Prognoze -->

        <div class="news-section">

            <!-- Alege nota laborator -->
            <div id="lab" class="course-content">
                <form action="../controllers/course.controller.php" method="POST">
                    <?php 
                        include_once "../../app/views/components/general.components.php";
                        include_once "../../app/models/round.model.php";

                        $isActive = Round::isActive($courseID, 'lab');

                        if ($isActive){
                            $roundLabID = Round :: getIdRound($_SESSION['courseID'], 'lab');
                            $timeLab = Round :: getRoundDate($roundLabID);

                            echo '<h1 class="to-align">' . $courseName . '</h1>';
                            echo Components::active_round_view('lab', $timeLab);
                        } else {
                            echo '<h1 class="to-align">' . $courseName . '</h1>';
                            $filePath = Result:: getFilePath($year, $_SESSION['courseID'], 'lab');
                            echo Components::inactive_round_view($filePath);
                        }
            
                    ?>
                </form>
            </div>

            <!-- Alege nota curs -->
            <div id="curs" class="course-content">
                <form action="../controllers/course.controller.php" method="POST">
                    <?php 
                        include_once "../../app/views/components/general.components.php";
                        include_once "../../app/models/round.model.php";

                        $isActive = Round::isActive($courseID, 'course');

                        if ($isActive){
                            $roundCourseID = Round :: getIdRound($_SESSION['courseID'], 'course');
                            $timeCourse= Round :: getRoundDate($roundCourseID);

                            echo '<h1 class="to-align">' . $courseName . '</h1>';
                            echo Components::active_round_view('course', $timeCourse);
                        } else {
                            echo '<h1 class="to-align">' . $courseName . '</h1>';
                            $filePath = Result :: getFilePath($year, $_SESSION['courseID'], 'course');
                            echo Components::inactive_round_view($filePath);
                        }
                    ?>
                </form>
            </div>

            <input type="button"  class="button-course lab" onclick="choose_eval('lab', this, 'rgba(0, 150, 136, 0.77)')" id="defaultOpen" name="labButton" value="Laborator"/>
            <input type="button" class="button-course da" onclick="choose_eval('curs', this, 'rgba(0, 150, 136, 0.77)')" name="courseButton" value="Curs"/>
            
            
        <!-- /Prognoze -->
        </div>

        <!-- Informations -->
        <div class="info-section paragraph-padding-64">

            <!-- Vote -->
            <div class="tags-section white-content">
                <div class="tags-content">
                    <h4>Îți place aplicația noastră?</h4>
                </div>
                <div class="votes white-content">

                    <!-- Au raspuns cu DA -->
                    <div class="side yes-image"></div>
                    <div class="middle">
                        <div class="procentaj">
                            <div class="yes"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div>30</div>
                    </div>

                    <!-- Au raspuns cu NU -->
                    <div class="side no-image"></div>
                    <div class="middle">
                        <div class="procentaj">
                            <div class="no"></div>
                        </div>
                    </div>
                    <div class="right">
                        <div>1</div>
                    </div>
                    <br>
                </div>
                <br>
                <button type="button" class="vote-button">Da</button>
                <button type="button" class="vote-button">Meh</button>
                <!-- /Vote-->
            </div>

            <!-- RSS Feed Section -->
            <div class="rss-section white-content">
                <div class="tags-content">
                    <h4>RSS Feed</h4>
                </div>
                <div class="text-tags white-content">
                    <ul>
                        <li class="rss-image">
                            <a class="rss-subtext" href="./rss.view.html" title="Subscribe to RSS Feed">RSS Feed</a>
                        </li>
                    </ul>
                </div>
                <!-- RSS Feed Section -->
            </div>

            <!-- Subscribe Section -->
            <div class="subscribe-section white-content">
                <div class="tags-content">
                    <h4>Subscribe</h4>
                </div>
                <div class="clear text-tags white-content">
                    <p>
                        Introduceți e-mailul pentru a primi notificări
                        <br id="break"> despre ultimele postări de pe aplicație.
                    </p>
                    <input class="sub-input" type="text" placeholder="E-mail..." style="width:100%">
                    <button type="button" onclick="document.getElementById('subscribe').style.display='block'" class="button-sub">Subscribe</button>
                </div>
                <!-- Subscribe Section -->
            </div>
            <!-- /Informations -->
        </div>
    </div>
    
    <div class="contact">
        <h3 class="to-align title">CONTACT</h3>
        <div class="contact-info-left">
            <h3>Dacă ceva nu este în regulă, nu ezita să ne scrii:</h3>
            <ul>
                <li class="check-in-icon">
                    <i class="info to-align large"></i>Iași, RO</li>
                <li class="phone-icon">
                    <i class="info to-align large"></i>Phone: 0748 022 866</li>
                <li class="mail-icon">
                    <i class="info to-align large"></i>Email: prognosix@gmail.com
                </li>
            </ul>
        </div>

        <div class="contact-info-right">
            <h3>Contestațiile se pot face de aici:</h3>
            <form action="../controllers/send_message.controller.php">
                <p>
                    <input class="sendm" type="text" placeholder="Nume..." required name="Nume">
                </p>
                <p>
                    <input class="sendm" type="text" placeholder="E-mail..." required name="E-mail">
                </p>
                <p>
                    <input class="sendm" type="text" placeholder="Subiect" required name="Subiect">
                </p>
                <p>
                    <input class="sendm" type="text" placeholder="Mesaj" required name="Mesaj">
                </p>
                <p>
                    <button class="sendm-button">Trimite</button>
                </p>
            </form>
        </div>

    </div>

    <!-- AJAX call and jquery and reload on success-->

    <script>
        $(document).on("click", ".pick-grade", function() {
            var nameAttr = $(this).attr("name");

            $.ajax({
                type: "POST",
                url: "../controllers/course.controller.php
                data: {active:active},
                success: function(data){
                    document.location.reload(true);
                }
            });

        });
            
        </script>




    <footer class="footer dark-content" id="footer">
        &copy; ProGnosiX Team 2018
    </footer>

    <script src="../../public/sidemenu.js"></script>
    <!-- <script src="../../public/comingsoon.js"></script> -->
    <script src="../../public/display_content.js"></script>
    

</body>

</html>