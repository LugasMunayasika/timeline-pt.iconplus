<?php
    $server = "localhost";
    $user   = "root";
    $ps     = "";
    $nama_db = "database_timeline";

    $kon = mysqli_connect($server,$user,$ps,$nama_db);
    $hsl2 = mysqli_query($kon, "SELECT JABATAN, COUNT(JABATAN) AS tipe FROM admin GROUP BY JABATAN");
    $d = array();
    while($r2 = mysqli_fetch_assoc($hsl2)){
        array_push($d, array("label"=>$r2['JABATAN'],"value"=>$r2['tipe']));
    }

    $c = array("caption"=> "Data Jumlah Pegawai Berdasarkan Jabatan",
            "theme"=>"fint"); 
    
    $gabung = array("chart"=>$c, "data"=>$d);
    //print_r($gabung);
    $j = json_encode($gabung);
    echo $j;        

?>