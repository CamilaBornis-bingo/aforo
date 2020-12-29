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
        <div class="h2 card-header text-center">INGRESO</div>
    </div>
    <?php
        if ($_POST) {
            Ingreso::agregarIngreso($pdo, $_POST);
        }

        $datos = BaseMYSQL::selectTodo($pdo);
        

        foreach ($datos as $key => $dato):
            $total= $dato["total_dataaforo"];
            $total_sp= $dato["total_salaespera_dataaforo"]; 
            $aux = $total;
            if ($total_sp > 0) {
                $aux = 501;
            } 
        endforeach; ?>

<div class="container alinear-2 display-1">
    <div class="card bg-secondary mb-3" style="max-width: 35rem"> <?php
                        if ($total < 500) { ?>
                                <div class="card-header text-center bg-success text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
                                <div class="card-header text-center bg-success text-white" id="sp"><?=$total_sp?> / <?=$capacidad_max_sp?></div>
                                <?php
                        } elseif($total == 500) { ?>
                                <div class="card-header text-center bg-primary text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
                                <div class="card-header text-center bg-success text-white" id="sp"><?=$total_sp?> / <?=$capacidad_max_sp?></div>
                                <?php 
                        } else{ ?>
                                    <div class="card-header text-center bg-primary text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
                                    <div class="card-header text-center bg-primary text-white" id="sp"><?=$total_sp?> / <?=$capacidad_max_sp?></div>
                                    <?php
                        }?>
                            <div class="card-body">
                                <img src="../img/plus_64.png" id="mas"/>
                            </div>
                        </div>
                    </div> <?php
                    if ($aux) :
                        if ($aux == 500) :?>
                    <div id="popup" class="alinear">
                        <div class="toast show p-3 mb-2 bg-warning text-dark" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="mr-auto">Capacidad limitada</strong>
                                <button type="button" onclick="cerrar()" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="toast-body">
                                A partir de ahora deben ingresar a Sala de espera. 
                            </div>
                        </div>
                    </div>
                    <?php     endif;
                    endif;?>
</body>
<script src="../js/app.js"></script>
</html>