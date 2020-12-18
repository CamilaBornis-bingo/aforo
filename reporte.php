<?php
include_once("conexion.php");

if ($_POST) {
    $desde = $_POST["fecha_desde"];
    $hasta = $_POST["fecha_hasta"];

    $sql = "SELECT * FROM data_aforo WHERE fechahora_dataaforo BETWEEN '$desde 10:00:00' AND '$hasta 05:00:00'";
    $qry= mysqli_query($conn, $sql);
} else {
    $sql = "SELECT * FROM data_aforo";
    $qry= mysqli_query($conn, $sql);
}
    $total = mysqli_num_rows($qry);
    $datos_x_pag = 50;

    $paginas = $total/$datos_x_pag;
    $paginas = ceil($paginas);
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
        <form action="" method="POST">
            <label for="fecha_desde"> Fecha desde </label>
            <input type="date" name="fecha_desde" value="<?=($_POST)? $desde : ''?>">
            <label for="fecha_hasta"> Fecha hasta </label>
            <input type="date" name="fecha_hasta" value="<?=($_POST)? $hasta : ''?>">
            <input type="submit" value="enviar">
        </form>
    <?php 
        if (!$_GET) {
            header('Location:reporte.php?pagina=1');
        }
        
        $iniciar = ($_GET['pagina']-1)*$datos_x_pag;

        if ($_POST) {
            $consulta = "SELECT * FROM data_aforo WHERE fechahora_dataaforo BETWEEN '$desde 10:00:00' AND '$hasta 05:00:00' LIMIT $iniciar, $datos_x_pag";

            //consulta datos totales
            $sql2 = "SELECT *, SUM(ingreso_dataaforo) as ingreso, SUM(egreso_dataaforo) as egreso FROM data_aforo WHERE fechahora_dataaforo BETWEEN '$desde 10:00:00' AND '$hasta 05:00:00'";
            $qry2= mysqli_query($conn, $sql2);
        } else {
            $consulta = 'SELECT * FROM data_aforo LIMIT '.$iniciar.', '.$datos_x_pag.'';
        }

        $query= mysqli_query($conn, $consulta);
        $resultado = mysqli_fetch_array($query, MYSQLI_NUM);

        
    ?>

        <?php if($_POST): ?>
            <h2>Totales</h2>
        <?php while ($rslt2= mysqli_fetch_array($qry2)) :
                $ingreso = $rslt2['ingreso'];
                $egreso = $rslt2['egreso']; ?>
                <h3>Ingresos:<?=$ingreso?></h3>
                <h3>Egresos:<?=$egreso?></h3>
        <?php endwhile;
            $dif = $ingreso - $egreso;
            ?>
            <h3>Diferencia:<?=$dif?></h3>
        <a href="exportar.php?inicio=<?=$desde?>&final=<?=$hasta?>&ingreso=<?=$ingreso?>&egreso=<?=$egreso?>">Descargar reporte </a>
        <?php endif ?>
    <table class="table table-hover"> 
            <tr>
                <td>Ingresos</td>
                <td>Egresos</td>
                <td>Total</td>
                <td>Sala de espera</td>
                <td>Fecha y hora</td>
            </tr>
            <?php while($resultado= mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td><?=$resultado['ingreso_dataaforo']?></td>
                        <td><?=$resultado['egreso_dataaforo']?></td>
                        <td><?=$resultado['total_dataaforo']?></td>
                        <td><?=$resultado['total_salaespera_dataaforo']?></td>
                        <td><?=$resultado['fechahora_dataaforo']?></td>
                    </tr>
            <?php endwhile ?>
        </table>

    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php for ($i=1; $i <= $paginas ; $i++) : ?>
        <?php  if ($_POST) { ?>
            <li class="page-item"><a class="page-link" href="reporte.php?pagina=<?=$i?>"><?=$i?></a></li><?php
        } else { ?>
            <li class="page-item"><a class="page-link" href="reporte.php?pagina=<?=$i?>"><?=$i?></a></li><?php
        }
         ?>
    <?php endfor ?> 
  </ul>
</nav>
</body>
</html>