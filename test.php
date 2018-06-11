<?php
require_once "C:/xampp/htdocs/ultima-ultima-versiune/vendor/autoload.php";

//$name does not exist and $pdf_path is an absolute path that probably does not exist.//
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;
require "C:/xampp/htdocs/ultima-ultima-versiune/vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Writer/Pdf/Mpdf.php";

$new_excel_path = "C:/xampp/htdocs/ultima-ultima-versiune/app/controllers/uploads/rezultate.xlsx";
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
$spreadsheet = $reader->load("$new_excel_path");

echo 'Am ajuns dupa rezultate.xlsx';
//Conversione della variabile spreadsheet in pdf

//Creazione del writer
//$writer = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf($spreadsheet); 

//$class = \PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf::class;
//\PhpOffice\PhpSpreadsheet\IOFactory::registerWriter('Pdf', $class);
//$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Pdf');


$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Mpdf'); 

//Salvataggio del pfd
$name="rezultate.pdf";
$pdf_path = 'C:/xampp/htdocs/ultima-ultima-versiune/app/controllers/uploads/' . $name ;
echo '<br>';
echo $pdf_path;
$writer->save($pdf_path);
echo 'Terminat PDF Spool\n';

$csv_path = 'C:/xampp/htdocs/ultima-ultima-versiune/app/controllers/uploads/rezultate.csv';
$writer2 = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
$writer2->save($csv_path);
echo 'Terminat CSV Spool';
?>