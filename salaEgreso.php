<?php
    include "conexion.php";
    include "config.php";

    $valMenos= $_POST['valorMenos'];

    //CONSULTA A LA BD QUE CONSULTA EL TOTAL DE LA SALA
    $sql= "SELECT * FROM sala_espera  ORDER BY idsala_espera DESC LIMIT 1";
    $qry= mysqli_query($conn, $sql);

    while($rslt= mysqli_fetch_array($qry)){
        $control = $rslt['control_sala']; 
    }

    //SE GUARDA EN LA BASE
        $total_actual= $control - $valMenos;

        $sql_1= "INSERT INTO sala_espera(control_sala) VALUES($total_actual)";
        mysqli_query($conn, $sql_1);
    


    mysqli_close($conn);
?>
