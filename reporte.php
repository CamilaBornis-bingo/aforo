<?php
include_once("conexion.php");

    if ($_POST) {
        $desde = $_POST["fecha_desde"];
        $hasta = $_POST["fecha_hasta"];
        
        $sql = "SELECT * FROM data_aforo WHERE fechahora_dataaforo BETWEEN '$desde' AND '$hasta'";
        $qry= mysqli_query($conn, $sql);
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
            <input type="date" name="fecha_desde">
            <label for="fecha_hasta"> Fecha hasta </label>
            <input type="date" name="fecha_hasta">
            <input type="submit" value="enviar">
        </form>
    </div> 

<?php if($_POST) : ?>
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
    </div>
<a href="exportar.php?inicio=<?=$desde?>&final=<?=$hasta?>">Descargar reporte </a>
<?php endif; ?>

</body>
</html>
