<?php include "../autoload.php";?>
<?php include "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appforo</title>
    <link rel="stylesheet" href="../libs/bootstrap.min.css"/>
</head>
<body>
    <?php
        $datos = BaseMYSQL::selectTodo($pdo);
        foreach ($datos as $key => $dato):
            $total= $dato["total_dataaforo"];
            $total_sp= $dato["total_salaespera_dataaforo"]; 
        endforeach; ?>
                    <div class="container">
                        <p class="fuente-monitor h1">CAPACIDAD TOTAL SALA</p>
                        <p class="fuente-monitor h1"><?=$total?> / <?=$capacidad_max_sala?></p>
                        <p class="fuente-monitor h1">CAPACIDAD SALA ESPERA</p>
                        <p class="fuente-monitor h1"><?=$total_sp?> / <?=$capacidad_max_sp?></p>
                    </div>

</body>
<script src="../js/app.js"></script>
</html>