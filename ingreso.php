
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appforo</title>
    <link rel="stylesheet" href="libs/bootstrap.min.css"/>
    <link rel="stylesheet" href="general.styles.css"/>
    <!--<script src="app.js"></script>-->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Bingo Oasis APP </a>
        <a href="index.php" class="alinear-btn-back"><img src="img/goback.png"/></a>
    </nav>
<div class="containeR">
            <div class="h2 card-header text-center">INGRESO</div>
    </div>
<?php
        include 'conexion.php';
        include 'config.php';

        $sql= "SELECT * FROM data_aforo ORDER BY id_dataaforo DESC LIMIT 1";
        $qry= mysqli_query($conn, $sql);

        while($rslt= mysqli_fetch_array($qry)) {
            $total= $rslt["total_dataaforo"];
            $total_sp= $rslt["total_salaespera_dataaforo"];

            if($total == NULL) {
                echo '<div class="container alinear-2 display-1">
                <div class="card bg-secondary mb-3" style="max-width: 35rem"> 
                  <div class="card-header text-center"> 000 / '.$capacidad_max_sala.'</div>
                  <div class="card-header text-center">  00 / '.$capacidad_max_sp.'</div>
                <div class="card-body">
                  <img src="img/plus_64.png" id="mas" class="icon-64"/>
                  <img src="img/minus_32.png" id="menos" class="icon-32"/>                                          
              </div>
              </div>
              </div>';
            } else {?>
                    <div class="container alinear-2 display-1">
                    <div class="card bg-secondary mb-3" style="max-width: 35rem"> <?php
                    if ($total < 500) { ?>
                            <div class="card-header text-center bg-success text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
                            <!--<div class="card-header text-center bg-success text-white" id="sp"><?=$total_sp?> / <?=$capacidad_max_sp?></div>-->
                            <?php
                    } elseif($total == 500) { ?>
                            <div class="card-header text-center limite text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
                            <!--<div class="card-header text-center bg-success text-white" id="sp"><?=$total_sp?> / <?=$capacidad_max_sp?></div>-->
<?php               } else{ ?>
                            <div class="card-header text-center limite text-white" id="sala"><?=$total?> / <?=$capacidad_max_sala?></div>
                            <!--<div class="card-header text-center limite text-white" id="sp"><?=$total_sp?> / <?=$capacidad_max_sp?></div>-->
<?php
                    }
                    ?>
                    <div class="card-body">
                        <img src="img/plus_64.png" id="mas"/>
                    </div>
                    </div>
                    </div> <?php
            }
        }
    ?>

<!-- FIN NUEVO -->
    <?php
        include 'conexion.php';
        include "config.php";

       
        $sql= "SELECT * FROM data_aforo ORDER BY id_dataaforo DESC LIMIT 1 ";
        $qry= mysqli_query($conn, $sql);


        while($rslt= mysqli_fetch_array($qry)) {
            $total= $rslt["total_salaespera_dataaforo"];?>
                    <div class="container alinear-2 display-1">
                    <div class="card bg-secondary mb-3" style="max-width: 35rem"> <?php
                        if ($total < 100) { ?>
                            <div class="card-header text-center bg-success text-white"><?=$total?> / <?=$capacidad_max_sp?></div> <?php
                        } else { ?>
                            <div class="card-header text-center limite text-white"><?=$total?> / <?=$capacidad_max_sp?></div> <?php
                        }
                    ?>
                    </div>
                    </div>
        <?php    
        }
        $sql= "SELECT * FROM data_aforo ORDER BY id_dataaforo DESC LIMIT 1 ";
        $qry= mysqli_query($conn, $sql);

        while($rslt= mysqli_fetch_array($qry)) {
            $total= $rslt["total_dataaforo"];
            $total_sp= $rslt["total_salaespera_dataaforo"];
            $aux = $total;
            if ($total_sp > 0) {
                $aux = 501;
            } 
        }
        if ($aux) {
             if ($aux == 500) {?>
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
  <?php     }
        }
    ?>



</body>
    <script>
        // const Minus= document.getElementById('menos')
        const Plus= document.getElementById('mas')
        
        Plus.addEventListener('click', (e)=>{
            e.preventDefault()

            datasend="valorMas="+1;

            //console.log(datasend);

            xmlhttp= new XMLHttpRequest();
	        xmlhttp.onreadystatechange= function(){
		        if(this.readyState==4 && this.status==200){
                    console.log(this.responseText)
                    location.reload()
		        }
	        }
	        xmlhttp.open("POST","masIngreso.php", true);
	        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	        xmlhttp.send(datasend);
        })


        function cerrar() {
            var x = document.getElementById("popup");
            if (x.style.display == "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }


        setTimeout(() => {
            location.reload()
        }, 5000);


    </script>
</html>