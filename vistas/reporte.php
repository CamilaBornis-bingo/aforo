<?php
include "../autoload.php";
include "header.php";

if ($_POST) {
    $total = Reporte::totalxDia($pdo, $_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libs/bootstrap.min.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
    <title>AppForo</title>
</head>
<body>
<div class="container">
        <div class="h2 card-header text-center">REPORTES</div> <br>
        <center>
            <form action="" method="POST">
                <label for="fecha_desde"> Fecha a exportar </label>
                <input type="date" name="fecha_desde" value="<?=($_POST)? $_POST['fecha_desde'] : date('Y-m-d')?>">
                <input type="submit" value="enviar">
            </form>
        </center>
</div>
    <?php 
    ?>

        <?php if($_POST): ?>
            <center>
                <a href="exportar.php?fecha_desde=<?=$_POST['fecha_desde']?>">Descargar Excel </a> <br>
                <a href="exportarCSV.php?fecha_desde=<?=$_POST['fecha_desde']?>">Descargar CSV </a>
            </center> <br>

        <div class="card bg-secondary mb-3 container" style="max-width: 20rem;">
            <div class="card-header justify-content-center">Totales -  <?=($_POST)? $_POST['fecha_desde'] : ''?></div>
            <div class="card-body">
                <?php foreach ($total as $key => $value) : ?>
                    <h4 class="card-title">Ingresos: <?=$value['total']?></h4>
                    <h4 class="card-title">Egresos: <?=$value['egreso']?></h4>
                <?php endforeach; ?>
            </div>
        </div>
            
    <?php endif ?>
</body>
</html>