<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$column_header=[ "id_tim", "jenis_layanan"];
    $j=1;
    foreach($column_header as $x_value) {
        $sheet->setCellValueByColumnAndRow($j,1,$x_value);
        $j=$j+1;
    }

//ambil data dari db
$kon = mysqli_connect("localhost","root","","timeline_iconplus");

$sql = "SELECT * FROM `tim`";
$data = mysqli_query($kon,$sql);

$i=2;
while($rcrd = mysqli_fetch_row($data)){
    print_r($rcrd);
    echo "<br>";

    $sheet->setCellValueByColumnAndRow(1,$i,$rcrd[0]);
    $sheet->setCellValueByColumnAndRow(2,$i++,$rcrd[1]);



}

    // Write an .xlsx file 
    $writer = new Xlsx($spreadsheet);

    // Save .xlsx file to the files directory 
    $writer->save('timeline_iconplus_tim.xlsx'); 
?>