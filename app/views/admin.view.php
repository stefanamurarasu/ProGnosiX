<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ProGnosiX</title>
    <link rel="stylesheet" href="../../public/hfsm-style.css">
    <link rel="stylesheet" href="../../public/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>

<body>
    <div class="header neutral" id="header">
        <div class="logo">
            <a href="./login.view.html">ProGnosiX</a>
        </div>
        <div class="header-right">
            <div class="form make-me-inline">
                <input type="submit" value="Logout">
            </div>
        </div>
    </div>

    <hr class="hr-dashed">

    <div id="content" class="admin-content">
    <form action="../controllers/results.controller.php" method="post" enctype="multipart/form-data">
        <div class="choose">
            <button class="button-year">Alegeți anul studentului</button>
            <select name="selectYear" class="button-year-content">
                <option value="1">Anul 1</option>
                <option value="2">Anul 2</option>
                <option value="3">Anul 3</option>
            </select>
        </div>
        <div class="choose_2">
            <button class="button-group">Alegeți grupa studentului</button>
            <select name="selectGroupNb" class="button-group-content">
                <option value="Grupa 1">Grupa 1</option>
                <option value="Grupa 2">Grupa 2</option>
                <option value="Grupa 3">Grupa 3</option>
                <option value="Grupa 4">Grupa 4</option>
                <option value="Grupa 5">Grupa 5</option>
                <option value="Grupa 6">Grupa 6</option>
                <option value="Grupa 7">Grupa 7</option>
            </select>
        </div>
        <div class="choose_3">
            <button class="button-course">Alegeți materia la care predați</button>
            <select name="selectCourse" class="button-course-content">
                <option value="1">Tehnologii Web</option>
                <option value="2">PSGBD</option>
                <option value="3">Programare Avansată</option>
                <option value="4">Ingineria Programării</option>
                <option value="5">Criptografie</option>
                <option value="6">Matlab</option>
                <option value="7">Probabilitati si statistica</option>
                <option value="8">Proiectarea algoritmilor</option>
                <option value="9">FAI</option>
                <option value="10">Sisteme de operare</option>
                <option value="11">Programare orientata-obiect</option>
                <option value="12">Limba Engleza II</option>
                <option value="13">ACTN</option>
                <option value="14">Retele Petri si Aplicatii</option>
                <option value="15">Calcul numeric</option>
                <option value="16">PMS Office</option>
                <option value="17">Grafica pe calculator</option>
            </select>
        </div>

        <div class="choose_2">
                <button class="button-type" type="button">Alegeți tipul de examinare</button>
                <select name="selectType" class="button-type-content">
                    <option value="lab">Laborator</option>
                    <option value="course">Curs</option>
                </select>
        </div>
        <br>
        <h3 style="color:white">Scurtă descriere: </h3> <br><br>
        <input id="description" type="text" name="result">
        <h2>Pentru alegerile tale: </h2>
        
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Incarca rezultatele" name="submit_file">
    </form>
    </div>

    <footer class="footer" id="footer">
        &copy; ProGnosiX Team 2018
    </footer>
</body>

</html>
