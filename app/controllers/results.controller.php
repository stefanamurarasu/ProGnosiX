<?php
    session_start();

    require_once "C:/xampp/htdocs/ultima-ultima-versiune/vendor/autoload.php";

    //$name does not exist and $pdf_path is an absolute path that probably does not exist.//
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer;
    use PhpOffice\PhpSpreadsheet\Writer\Pdf;
    require "C:/xampp/htdocs/ultima-ultima-versiune/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Pdf/Mpdf.php";

    switch($_SERVER['REQUEST_METHOD']){
        case "GET":
            include_once "../models/user.model.php";

            if(!isset($_SESSION["token"])) {
                $loggedUser = new User(NULL);
            } else {
                $loggedUser = new User($_SESSION["token"]);
            }

            if($loggedUser -> isLogged()) {
                include_once "../views/admin.view.php";
            } else {
                header("Location: ../views/login_failed.view.html");
            }
            break;

           if(isset($_SESSION["results_worked"])){
                unset($_SESSION["results_worked"]);
                header("Location: ../views/admin.view.php");

           } else if (isset($_SESSION["activate_failed"])){

               unset($_SESSION["activate_failed"]);
               header("Location: ../views/round_failed.view.html");

           } else {
               include_once "../views/login_failed.view.html";
           }
           break;

        case "POST":

           include_once "../models/results.model.php";
           include_once "../models/auth.model.php";

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

           if ( isset($_POST["submit_file"]) ){
                $year = isset($_POST['selectYear']) ? $_POST['selectYear'] : false;
                $groupNb = isset($_POST['selectGroupNb']) ? $_POST['selectGroupNb'] : false;
                $course = isset($_POST['selectCourse']) ? $_POST['selectCourse'] : false;
                $type = isset($_POST['selectType']) ? $_POST['selectType'] : false;
                $resultDescription = isset($_POST['result']) ? $_POST['result'] : false;
                

                // Fisierul exista deja
                if (file_exists($target_file)) {
                    echo "Fisier existent.";
                    $uploadOk = 0;
                }

                $filepath = $target_file;

                if ($uploadOk == 0) {
                    echo "Fisierul nu poate fi incarcat!";

                } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "Fisierul ". basename( $_FILES["fileToUpload"]["name"]). " a fost incarcat cu succes.";
                }

                // convert to CSV and PDF
               

                $new_excel_path = "C:/xampp/htdocs/ultima-ultima-versiune/app/controllers/uploads/rezultate.xlsx";
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
                $spreadsheet = $reader->load("$new_excel_path");

                //echo 'Am ajuns dupa rezultate.xlsx';

                //creeaza writer
                //$writer = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf($spreadsheet); 

                //$class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
                //\PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);
                //$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Pdf');


                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Mpdf'); 

                $name="rezultate.pdf";
                $pdf_path = 'C:/xampp/htdocs/ultima-ultima-versiune/app/controllers/uploads/' . $name ;
                
                $writer->save($pdf_path);
                

                $csv_path = 'C:/xampp/htdocs/ultima-ultima-versiune/app/controllers/uploads/rezultate.csv';
                $writer2 = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
                $writer2->save($csv_path);
                // / convert to CSV and PDF

                // $filepath =  $target_file;
                $csvPath = 'uploads/rezultate.csv';
                $pdfPath = 'uploads/rezultate.pdf';
                $result = Result :: insertResults($year,  $filepath, $csvPath, $pdfPath, $groupNb, $course, $resultDescription, $type);
                
                if ($result){
                    $_SESSION["results_worked"] = TRUE;
                    header("Location: ../views/admin.view.php");
                } else {
                    $_SESSION["results_failed"] = TRUE;
                    header("Location: ../views/round_failed.view.html");
                }    
            }

           if(isset($_POST["logout_user"])) {
                Auth::logout();
                header("Location: ../views/404.view.html");
            }

            break;

        default:
            break;
    }

?>
    