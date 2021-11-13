<?php
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$spreadsheet = $reader->load("assets/data_wbs.xlsx");
$d=$spreadsheet->getSheet(0)->toArray();
?>