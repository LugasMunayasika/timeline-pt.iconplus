<?php
    $server = "localhost";
    $user   = "root";
    $ps     = "";
    $nama_db = "database_timeline";

    $kon = mysqli_connect($server,$user,$ps,$nama_db);
    $hsl2 = mysqli_query($kon, "SELECT JENKEL, COUNT(JENKEL) AS tipe FROM admin GROUP BY JENKEL");
    $d = array();
    while($r2 = mysqli_fetch_assoc($hsl2)){
        array_push($d, array("label"=>$r2['JENKEL'],"value"=>$r2['tipe']));
    }

    $c = array("caption"=> "Data User",
            "subCaption"=>"Jenis Kelamin",
            "theme"=>"fint"); 
    
    $gabung = array("chart"=>$c, "data"=>$d);
    //print_r($gabung);
    $j = json_encode($gabung);
    echo $j;        

?>