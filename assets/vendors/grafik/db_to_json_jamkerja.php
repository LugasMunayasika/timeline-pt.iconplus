<?php
    $server = "localhost";
    $user   = "root";
    $ps     = "";
    $nama_db = "database_timeline";

    $kon = mysqli_connect($server,$user,$ps,$nama_db);

    $hsl = mysqli_query($kon, "SELECT ROLE FROM admin GROUP BY JENKEL");
    $hsl2 = mysqli_query($kon, "SELECT ALAMAT FROM admin GROUP BY JENKEL");

    $d = array();
    while($r = mysqli_fetch_assoc($hsl) and $r2 = mysqli_fetch_assoc($hsl2)){
        array_push($d, array("label"=>$r['ROLE'],"value"=>$r2['ALAMAT']));
    }

    $c = array("caption"=>"Admin",
            "subCaption"=>"Role",
            "xAxisName"=>"Alamat",
            "yAxisName"=>"Jenis Kelamin",
            "theme"=>"fint"); 
    
    $gabung = array("chart"=>$c, "data"=>$d);
    //print_r($gabung);
    $j = json_encode($gabung);
    echo $j;        

?>