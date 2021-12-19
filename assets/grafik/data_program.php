<?php
    $server = "localhost";
    $user   = "root";
    $ps     = "";
    $nama_db = "database_timeline";

    $kon = mysqli_connect($server,$user,$ps,$nama_db);
    $hsl2 = mysqli_query($kon, "SELECT NAMA_PROGRAM, COUNT(NAMA_PROGRAM) AS tipe FROM proyek join program on proyek.ID_PROGRAM = program.ID_PROGRAM GROUP BY NAMA_PROGRAM" );
    $d = array();
    while($r2 = mysqli_fetch_assoc($hsl2)){
        array_push($d, array("label"=>$r2['NAMA_PROGRAM'],"value"=>$r2['tipe']));
    }

    $c = array("caption"=> "Data Jumlah Proyek Per Program",
            "theme"=>"fint"); 
    
    $gabung = array("chart"=>$c, "data"=>$d);
    //print_r($gabung);
    $j = json_encode($gabung);
    echo $j;        

?>