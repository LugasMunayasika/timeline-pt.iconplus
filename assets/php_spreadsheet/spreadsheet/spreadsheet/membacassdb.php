<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$spreadsheet = $reader->load("data_ormawa.xlsx");
$data=$spreadsheet->getSheet(0)->toArray();

//print_r($data);

$kon = mysqli_connect("localhost","root","","timeline_iconplus");


$N = count($data);
for($i=1; $i<$N; $i++){
    //echo $data[$i][0];

    echo $s ="INSERT INTO `penjadwalan` (`id_jadwal`, `nama_tim`, `tanggal`, `jam_kerja`, 'jenis_layanan', 'progres') 
             VALUES 
             (NULL, '".$data[$i][0]."', '".$data[$i][1]."', '".$data[$i][2]."', '".$data[$i][3]."', '".$data[$i][4]."', '".$data[$i][5]."')";
    echo "<br>";    
    mysqli_query($kon,$s);
}

?>