<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$spreadsheet = $reader->load("data01.xlsx");

$d=$spreadsheet->getSheet(0)->toArray();
//echo count ($d);
//print_r($d[0][0]);
foreach ($d as $k){
    //print_r($k);
    echo $k[0].'--'.$k[1].'--'.$k[2].'<br>';
}
?>