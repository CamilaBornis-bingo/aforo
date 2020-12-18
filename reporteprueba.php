<?php
include_once("conexion.php");

    if ($_POST) {
        $desde = $_POST["fecha_desde"];
        $hasta = $_POST["fecha_hasta"];

        $fechaD = date($desde);
        $fechaH = date($hasta);
        
        $sql = "SELECT * FROM data_aforo WHERE fechahora_dataaforo BETWEEN '$desde 10:00:00' AND '$hasta 05:00:00'";
        $qry= mysqli_query($conn, $sql);

        $sql2 = "SELECT *, SUM(ingreso_dataaforo) as ingreso, SUM(egreso_dataaforo) as egreso FROM data_aforo WHERE fechahora_dataaforo BETWEEN '$desde 10:00:00' AND '$hasta 05:00:00'";
        $qry2= mysqli_query($conn, $sql2);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap.min.css"/>
    <link rel="stylesheet" href="general.styles.css"/>
    <title>AppForo</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">Bingo Oasis APP</a>
                <a href="index.php" class="alinear-btn-back"><img src="img/goback.png"/></a>
    </nav>
    <div class="container">
        <form action="" method="POST">
            <label for="fecha_desde"> Fecha desde </label>
            <input type="date" name="fecha_desde" value="<?=($_POST)? $desde : ''?>">
            <label for="fecha_hasta"> Fecha hasta </label>
            <input type="date" name="fecha_hasta" value="<?=($_POST)? $hasta : ''?>">
            <input type="submit" value="enviar">
        </form>
    </div> 

    <?php if($_POST) : ?>
        <h2>Totales</h2>
        <?php
            while ($rslt2= mysqli_fetch_array($qry2)) {
                $ingreso = $rslt2['ingreso'];
                $egreso = $rslt2['egreso'];
                ?>
                <h3>Ingresos:<?=$ingreso?></h3>
                <h3>Egresos:<?=$egreso?></h3><?php
            } 
            $dif = $ingreso - $egreso;
            ?>
            <h3>Diferencia:<?=$dif?></h3>
        <a href="exportar.php?inicio=<?=$desde?>&final=<?=$hasta?>&ingreso=<?=$ingreso?>&egreso=<?=$egreso?>">Descargar reporte </a>
    <div class="container-fluid alinear">
        <table border=1> 
            <tr>
                <td>Ingresos</td>
                <td>Egresos</td>
                <td>Total</td>
                <td>Sala de espera</td>
                <td>Fecha y hora</td>
            </tr>
            <?php
            // $aux = 0;
            // $ingreso = 0;
            // $egreso = 0;
                while($rslt= mysqli_fetch_array($qry)) { 
                    // $total = $rslt['total_dataaforo'];
                    // if ($total < $aux) {
                    //     $ingreso++;
                    //     $aux = $total;
                    // } else {
                    //     $egreso++;
                    //     $aux = $total;
                    // }
                    ?>
                    <tr>
                        <td><?=$rslt['ingreso_dataaforo']?></td>
                        <td><?=$rslt['egreso_dataaforo']?></td>
                        <td><?=$rslt['total_dataaforo']?></td>
                        <td><?=$rslt['total_salaespera_dataaforo']?></td>
                        <td><?=$rslt['fechahora_dataaforo']?></td>
                    </tr>
        <?php } 
        ?>
        </table>
    </div>
<?php endif; ?>

</body>
</html>
