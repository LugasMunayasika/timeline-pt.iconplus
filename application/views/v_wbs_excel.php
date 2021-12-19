<?php
require('./assets/php_spreadsheet/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$column_header=["ID Proyek","PIC","Tanggal Awal","Tanggal Akhir","Durasi","ID Program","Nama Proyek"];
$j=1;
foreach($column_header as $x_value) {
		$sheet->setCellValueByColumnAndRow($j,1,$x_value);
  		$j=$j+1;
	}

//ambil data dari db
$kon = mysqli_connect("localhost","root","","database_timeline");

$sql = "SELECT * FROM `proyek`";
$data = mysqli_query($kon,$sql);

$i = 2;
while($record = mysqli_fetch_row($data)){
    $sheet->setCellValueByColumnAndRow(1,$i,$record[0]);
    $sheet->setCellValueByColumnAndRow(2,$i,$record[1]);
    $sheet->setCellValueByColumnAndRow(3,$i,$record[2]);
    $sheet->setCellValueByColumnAndRow(4,$i,$record[3]);
    $sheet->setCellValueByColumnAndRow(5,$i,$record[4]);
    $sheet->setCellValueByColumnAndRow(6,$i,$record[5]);
    $sheet->setCellValueByColumnAndRow(7,$i,$record[6]);
    $i++;
}

$writer = new Xlsx($spreadsheet); 
  
// Save .xlsx file to the files directory 
$writer->save('data_wbs.xlsx');
?>