<?php
    include "conexion.php";
    include "config.php";


    $sql2= "SELECT * FROM data_aforo  ORDER BY id_dataaforo DESC LIMIT 1";
    $qry2= mysqli_query($conn, $sql2);

    while($rslt= mysqli_fetch_array($qry2)){
        $totalsala = $rslt['total_dataaforo']; 
        $total_sp = $rslt['total_salaespera_dataaforo']; 
    }

    $valMenos= $_POST['valorMenos'];

    //SE GUARDA EN LA BASE
    if($totalsala < 500){
        //SE SUMA EL TOTAL CON EL VALOR NUEVO
        if ($total_sp >= 1) {
            $total_sala= $totalsala + $valMenos;
            $total_salaespera= $total_sp - $valMenos;
    
            $sql_1= "INSERT INTO data_aforo(egreso_dataaforo, total_dataaforo, total_salaespera_dataaforo) VALUES($valMenos, $total_sala, $total_salaespera)";
            mysqli_query($conn, $sql_1);
        }

    } else if($totalsala >= 500) { 
        echo 1;
    } else {
        echo 1;
    }





    mysqli_close($conn);
?>
