<?php
header("Content-Type:application/xls");
header("Content-Disposition: attachment;  filename=reporte_aforo.xls");

include_once("conexion.php");

$desde = $_GET["inicio"];
        $hasta = $_GET["final"];
        
        $sql = "SELECT * FROM data_aforo WHERE fechahora_dataaforo BETWEEN '$desde' AND '$hasta'";
        $qry= mysqli_query($conn, $sql); ?>
        <table border=1> 
        <tr>
            <td>Ingresos</td>
            <td>Egresos</td>
            <td>Total</td>
            <td>Sala de espera</td>
            <td>Fecha y hora</td>
        </tr>
        <?php
            while($rslt= mysqli_fetch_array($qry)) { ?>
                <tr>
                    <td><?=$rslt['ingreso_dataaforo']?></td>
                    <td><?=$rslt['egreso_dataaforo']?></td>
                    <td><?=$rslt['total_dataaforo']?></td>
                    <td><?=$rslt['total_salaespera_dataaforo']?></td>
                    <td><?=$rslt['fechahora_dataaforo']?></td>
                </tr>
    <?php } ?>
    </table>
