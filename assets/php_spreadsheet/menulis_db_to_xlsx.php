<?php

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$column_header=["bulan","tahun","revenue"];
$j=1;
foreach($column_header as $x_value) {
		$sheet->setCellValueByColumnAndRow($j,1,$x_value);
  		$j=$j+1;
	}

//ambil data dari db
$kon = mysqli_connect("localhost","root","","evieta");

$sql = "SELECT * FROM `month_revenue`";
$data = mysqli_query($kon,$sql);

$i = 2;
while($record = mysqli_fetch_row($data)){
    //print_r($record);
    echo "<Excel sudah terunduh>";
    echo "<br>";
    $sheet->setCellValueByColumnAndRow(1,$i,$record[1]);
    $sheet->setCellValueByColumnAndRow(2,$i,$record[2]);
    $sheet->setCellValueByColumnAndRow(3,$i,$record[3]);
    $i++;
}

$writer = new Xlsx($spreadsheet); 
  
// Save .xlsx file to the files directory 
$writer->save('huhu.xlsx');

?>