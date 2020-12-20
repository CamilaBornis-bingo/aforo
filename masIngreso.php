<?php
    include "conexion.php";
    include "config.php";

    $valMasIngreso= $_POST['valorMas'];

    //CONSULTA A LA BD QUE CONSULTA EL TOTAL DE LA SALA
    $sql= "SELECT * FROM data_aforo  ORDER BY id_dataaforo DESC LIMIT 1";
    $qry= mysqli_query($conn, $sql);

    while($rslt= mysqli_fetch_array($qry)){
        $total= $rslt['total_dataaforo'];
        $total_sp= $rslt['total_salaespera_dataaforo'];
    }

    //SE GUARDA EN LA BASE
    if($total < $capacidad_max_sala){
        if ($total_sp > 0) {
            $total_actual= $total_sp + $valMasIngreso;

            $sql_1= "INSERT INTO data_aforo(ingreso_dataaforo, total_dataaforo, total_salaespera_dataaforo) VALUES($valMasIngreso, $total, $total_actual)";
            mysqli_query($conn, $sql_1);   
        } else {
            //SE SUMA EL TOTAL CON EL VALOR NUEVO
            $total_actual= $total + $valMasIngreso;
    
            $sql_1= "INSERT INTO data_aforo(ingreso_dataaforo, total_dataaforo) VALUES($valMasIngreso, $total_actual)";
            mysqli_query($conn, $sql_1);
        }

    } else if($total >= $capacidad_max_sala && $total_sp < $capacidad_max_sp) {
        $total_actual= $total_sp + $valMasIngreso;

        $sql_1= "INSERT INTO data_aforo(ingreso_dataaforo, total_dataaforo, total_salaespera_dataaforo) VALUES($valMasIngreso, $total, $total_actual)";
        mysqli_query($conn, $sql_1);        
    
    } else if($total == $capacidad_max_sala && $total_sp == $capacidad_max_sp) {
        echo 1;
    }
    

    mysqli_close($conn);
?>

