<?php
header("Content-Type:application/xls");
header("Content-Disposition: attachment;  filename=aforo_".$_GET['fecha_desde'].".xls");

include_once("../autoload.php");
$datos = Reporte::reporteFechas($pdo, $_GET);
$totales = Reporte::totalxDia($pdo, $_GET); ?>
        <table border="2">
            <tr>Totales</tr>
            <tr>
                <td>Ingresos</td>
                <td>Egresos</td>
            </tr>
            <?php foreach ($totales as $key => $value) : ?>
                <tr>
                    <td><?=$value['total']?></td>
                    <td><?=$value['egreso']?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <table border=1> 
        <tr>
            <td>Ingresos</td>
            <td>Egresos</td>
            <td>Total</td>
            <td>Sala de espera</td>
            <td>Fecha y hora</td>
        </tr>
        <?php foreach ($datos as $key => $value) : ?>
            <tr>
                <td><?=$value['ingreso_dataaforo']?></td>
                <td><?=$value['egreso_dataaforo']?></td>
                <td><?=$value['total_dataaforo']?></td>
                <td><?=$value['total_salaespera_dataaforo']?></td>
                <td><?=$value['fechahora_dataaforo']?></td>
            </tr>
        <?php endforeach ?>
    </table>
