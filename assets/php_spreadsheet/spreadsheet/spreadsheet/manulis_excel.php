<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$data_from_db=array();
$data_from_db[0]=array("name"=>"raja","age"=>23);
$data_from_db[1]=array("name"=>"raja1","age"=>43);

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// print_r ($data_from_db);
 


//set value for indi cell

//writing cell index start at 1 not 0
$column_header=["Name","Age"];
$j=1;
    foreach($column_header as $x_value) {
        $sheet->setCellValueByColumnAndRow($j,1,$x_value);
        $j=$j+1;
    }
        for($i=0;$i<count($data_from_db);$i++)
        {
        //set value for indi cell
        $row=$data_from_db[$i];
        
        $j=1;
            
            foreach($row as $x => $x_value) {
                $sheet->setCellValueByColumnAndRow($j,$i+2,$x_value);
                $j=$j+1;
        }
         
}

$writer = new Xlsx($spreadsheet);
// Save .xlsx file to the files directory
$writer->save('demo.xlsx');

?>