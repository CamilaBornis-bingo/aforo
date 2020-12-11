<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appforo</title>
    <link rel="stylesheet" href="general.styles.css"/>
    <link rel="stylesheet" href="libs/bootstrap.min.css"/>
    <script src="monitor.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Bingo Oasis APP</a>
        <a href="index.php" class="alinear-btn-back"><img src="img/goback.png"/></a>
    </nav>

    <?php
        include 'conexion.php';
        include 'config.php';

        $sql= "SELECT * FROM data_aforo ORDER BY id_dataaforo DESC LIMIT 1";
        $qry= mysqli_query($conn, $sql);

        while($rslt= mysqli_fetch_array($qry)) {
            $total= $rslt["total_dataaforo"];
            $total_sp= $rslt["total_salaespera_dataaforo"];
            
            if($total == NULL) {
            echo'<div class="container alinear">
                    <h1>CAPACIDAD TOTAL SALA</h1>
                    <h2>000 / 500</h2>
                    <h1>CAPACIDAD SALA ESPERA</h1>
                    <h2>000 / 60</h2>
                    <h1>TIEMPO DE ESPERA APROX.:</h1>
                    <h2>00:30:00</h2>
                </div>';
            } else {
                echo '
                    <div class="alinear">
                        <p class="fuente-monitor">CAPACIDAD TOTAL SALA</p>
                        <p class="fuente-monitor">'.$total.' / '.$capacidad_max_sala.'</p>
                        <p class="fuente-monitor">CAPACIDAD SALA ESPERA</p>
                        <p class="fuente-monitor">'.$total_sp.' / '.$capacidad_max_sp.'</p>
                        <p class="fuente-monitor">TIEMPO DE ESPERA APROX.:</p>
                        <p class="fuente-monitor">00:30:00</p>
                    </div>
                ';
            }
        }
    ?>

</body>
        <script>
            setTimeout(()=>{
                window.location.reload()
            }, 1000)
        </script>
</html>