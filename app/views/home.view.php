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
    ?>


    <!-- Main content -->
    <div id="content" class="main-content">
        <span class="burger-menu" onclick="toggleNav()">&#9776;</span>

        <!-- News -->
        <div class="news-section">

            <div class="clear news-item paragraph-padding-64">
                <div class="position-paragraph pg-container">
                    <h1 class="txt-color">TEHNOLOGII WEB</h1>
                    <p>Tocmai s-a activat o nouă rundă. Fii sigur că ești printre primii care își încearcă norocul!</p>
                    <span>
                        <a class="link-style" href="first_course.view.html">Vezi pagina materiei&#8594;</a>
                    </span>
                    <div class="position-details pg-details">
                        <p class="test pg-border pg-padding-large pg-padding-32 to-align">Timp rămas: 7d 20:12h</p>
                    </div>
                </div>
            </div>

            <div class="clear news-item paragraph-padding-64">
                <div class="position-paragraph pg-container">
                    <h1 class="txt-color">INGINERIA PROGRAMĂRII</h1>
                    <p>S-au afisat rezultatele la Ingineria Programarii, la testul de laborator. Daca nu ai aflat deja ce nota
                        ai obtinut, intra pe link-ul de mai jos.
                    </p>
                    <span>
                        <a class="link-style" href="first_course.view.html">Vezi pagina materiei&#8594;</a>
                    </span>
                    <div class="position-details pg-details">
                        <p class="test pg-border pg-padding-large pg-padding-32 to-align">Timp rămas: 20d 20:12h</p>
                    </div>
                </div>
            </div>

            <div class="clear news-item paragraph-padding-64">
                <div class="position-paragraph pg-container">
                    <h1 class="txt-color">PROGRAMARE AVANSATĂ</h1>
                    <p>S-a mai activat o rundă. Verifică detaliile de pe pagina de Programare Avansată.</p>
                    <span>
                        <a class="link-style" href="first_course.view.html">Vezi pagina materiei&#8594;</a>
                    </span>
                    <div class="position-details pg-details">
                        <p class="test pg-border pg-padding-large pg-padding-32 to-align">Timp rămas: 7d 20:12h</p>
                    </div>
                </div>
            </div>

            <!-- /News -->
        </div>

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
                            <a class="rss-subtext" href="./rss.view.php" title="Subscribe to RSS Feed">RSS Feed</a>
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
                        <br> despre ultimele postări de pe aplicație.
                    </p>
                    <input class="sub-input" type="text" placeholder="E-mail..." style="width:100%">
                    <button type="button" onclick="document.getElementById('subscribe').style.display='block'" class="button-sub">Subscribe</button>
                </div>
                <!-- Subscribe Section -->
            </div>
            <!-- /Informations -->
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <div class="pag-numbers">
                <a class="button button-black" href="#">1</a>
                <a class="button button-black-hover" href="#">2</a>
                <a class="button button-black-hover" href="#">3</a>
                <a class="button button-black-hover" href="#">»</a>
            </div>
        </div>
        <!-- /Main content -->
    </div>


    <footer class="footer dark-content" id="footer">
        &copy; ProGnosiX Team 2018
    </footer>

    <script src="../../public/sidemenu.js"></script>
</body>

</html>