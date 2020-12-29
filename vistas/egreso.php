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
    <div class="container">
            <div class="h2 card-header text-center">EGRESO</div>
    </div>
    <?php
         if ($_POST) {
            Egreso::agregarEgreso($pdo, $_POST);
        }

        $datos = BaseMYSQL::selectTodo($pdo);
        
        foreach ($datos as $key => $dato):
            $total= $dato["total_dataaforo"];
            $total_sp= $dato["total_salaespera_dataaforo"]; 
        endforeach; ?>

                <div class="container alinear-2 display-1">
                    <div class="card bg-secondary mb-3" style="max-width: 35rem"> <?php
                    if ($total < 500) { ?>
                            <div class="card-header text-center bg-success text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div> <?php
                    } else{ ?>
                            <div class="card-header text-center bg-primary text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
    <?php           } ?>
                        <div class="card-body">
                            <img src="../img/minus_64.png" id="menos"/>
                        </div>
                    </div>
                </div> 
</body>
<script src="../js/app.js"></script>
</html>