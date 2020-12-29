<?php include "../autoload.php";?>
<?php include "header.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appforo</title>
    <link rel="stylesheet" href="../libs/bootstrap.min.css"/>
    <link rel="stylesheet" href="general.styles.css"/>
</head>
<body>
    <div class="container">
            <div class="h1 card-header text-center">SALA DE ESPERA</div>
    </div>
    <?php

        if ($_POST) {
            SalaEspera::descartarSP($pdo, $_POST);
        }

        $datos = BaseMYSQL::selectTodo($pdo);

        foreach ($datos as $key => $dato) :
            $total= $dato["total_dataaforo"];
            $total_sp= $dato["total_salaespera_dataaforo"];
        endforeach; ?>

                    <div class="container alinear-2 display-1">
                    <div class="card bg-secondary mb-3" style="max-width: 35rem"> <?php
                    if ($total < 500) { ?>
                            <div class="card-header text-center bg-success text-white" id="sp"><?=$total_sp?> / <?=$capacidad_max_sp?></div>
                            <div class="card-header text-center bg-success text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
                            <?php
                    } elseif($total == 500) { ?>
                            <div class="card-header text-center bg-success text-white" id="sp"><?=$total_sp?> / <?=$capacidad_max_sp?></div>
                            <div class="card-header text-center bg-primary text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
<?php               } else{ ?>
    <div class="card-header text-center bg-primary text-white" id="sp"><?=$total_sp?> / <?=$capacidad_max_sp?></div>
                            <div class="card-header text-center bg-primary text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
<?php
                    }
                    ?>
                    <div class="card-body">
                    <img src="../img/minus_64.png" id="menos_sp"/>
                    </div>
                    </div>
                    </div>

</body>
    <script src="../js/app.js"></script>
</html>