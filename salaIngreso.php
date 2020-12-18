<?php
    include "conexion.php";
    include "config.php";

    $valMasIngreso= $_POST['valorMas'];

    //CONSULTA A LA BD QUE CONSULTA EL TOTAL DE LA SALA
    $sql= "SELECT * FROM sala_espera  ORDER BY idsala_espera DESC LIMIT 1";
    $qry= mysqli_query($conn, $sql);

    while($rslt= mysqli_fetch_array($qry)){
        $control = $rslt['control_sala']; 
    }

    //SE GUARDA EN LA BASE
    if ($total_actual != $capacidad_max_sp) {
        $total_actual= $control + $valMasIngreso;

        $sql_1= "INSERT INTO sala_espera(control_sala) VALUES($total_actual)";
        mysqli_query($conn, $sql_1);
    } 
    


    mysqli_close($conn);
?>

