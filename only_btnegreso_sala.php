<?php
    include "conexion.php";
    include "config.php";

    $valMasIngreso= $_POST['valorMenos'];

    $sql= "SELECT * FROM data_aforo  ORDER BY id_dataaforo DESC LIMIT 1";
    $qry= mysqli_query($conn, $sql);

    while($rslt= mysqli_fetch_array($qry)){
        $total= $rslt['total_dataaforo'];
        $total_sp= $rslt['total_salaespera_dataaforo'];
    }

    //echo $total_actual;

        //SE GUARDA EN LA BASE
        if($total < $capacidad_max_sala || $total == $capacidad_max_sala){
            //SE SUMA EL TOTAL CON EL VALOR NUEVO
            $total_actual= $total - $valMasIngreso;
    
            $sql_1= "INSERT INTO data_aforo(egreso_dataaforo, total_dataaforo, total_salaespera_dataaforo) VALUES($valMasIngreso, $total_actual, $total_sp)";
            mysqli_query($conn, $sql_1);
    
        } 

    mysqli_close($conn);
?>
