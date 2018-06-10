
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../public/rss.css">
    <title>RSS Feed</title>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
    <div class="header neutral" id="header">
        <div class="logo">
            <a href="./login.view.html">ProGnosiX</a>
        </div>
        <div class="header-right">
            <span class="make-me-inline">Hello,
                <a href="./profile.view.html">
                    <img src="../../public/images/user-icon.png" alt="User icon" class="user-icon">
                </a>
            </span>
            <div class="form make-me-inline">
                <input type="submit" value="Logout">
            </div>
        </div>
    </div>
    
    <hr class="hr-dashed">
    
    <div id="navMenu" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="toggleNav()">&times;</a>
        <a href="TW.html">Tehnologii Web</a>
        <a href="PSGBD.html">PSGBD</a>
        <a href="PA.html">Programare Avansată</a>
        <a href="IP.html">Ingineria Programării</a>
        <a href="Optional.html">Opțional 2</a>
        <a href="Engleza.html">Limba Engleză</a>
    </div>

<?php
    $rss = simplexml_load_file("../../public/rss.xml");

    foreach ($rss->children() as $node) {
        foreach ($node as $child) {
            if ($child->children()) {
                foreach ($child->children() as $leaf) {
                    if ($leaf->getName() === 'title') {
                        echo "<h1 style='width:55%;margin-left:350px;font-family:Arial;font-size:15pt;background-color:#EEEEEE;text-align:center;'>{$leaf}</h1>";
                    } else {
                        echo "<p style='font-family:Arial;font-size:12pt;text-align:center;color:#EEEEEE'>{$leaf}</p>";
                    }
                    echo '<br>';
                }
            } else {
                if ($child->getName() === 'title') {
                    echo "<h1 style='margin-right:680px;font-family:Arial;font-size:20pt;text-align:center;color:#EEEEEE'>{$child}</h1>";
                } else {
                    echo "<h3 style='margin-right:525px;font-family:Arial;font-size:12pt;text-align:center;color:#EEEEEE'>{$child}</h3>";
                }
                echo "<BR>";
            }
        }
    }
?>

 <script src="../../public/sidemenu.js"></script>
 
 <footer class="footer" id="footer">Ultima actualizare: 06.05.2018.</footer>

</body>
</html>