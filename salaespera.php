
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
        <a class="navbar-brand" href="index.php">Bingo Oasis APP</a>
        <a href="index.php" class="alinear-btn-back"><img src="img/goback.png"/></a>
    </nav>

    <?php
        include 'conexion.php';
        include "config.php";

        $sql= "SELECT * FROM sala_espera ORDER BY idsala_espera DESC LIMIT 1 ";
        $qry= mysqli_query($conn, $sql);

        while($rslt= mysqli_fetch_array($qry)) {
            $total= $rslt["control_sala"];?>
                    <div class="container alinear-2 display-1">
                    <div class="card bg-secondary mb-3" style="max-width: 35rem"> <?php
                        if ($total < 100) { ?>
                            <div class="card-header text-center bg-success text-white"><?=$total?> / <?=$capacidad_max_sp?></div> <?php
                        } else { ?>
                            <div class="card-header text-center limite text-white"><?=$total?> / <?=$capacidad_max_sp?></div> <?php
                        }
                    ?>
                    <div class="card-body">
                    <img src="img/minus_64.png" id="menos"/>
                    <img src="img/plus_64.png" id="mas" class="icon-32"/>                                       
                    </div>
                    </div>
                    </div>
        <?php    
        }

        $sql2= "SELECT * FROM data_aforo ORDER BY id_dataaforo DESC LIMIT 1 ";
        $qry2= mysqli_query($conn, $sql2);

        while($rslt2= mysqli_fetch_array($qry2)) {
            $control= $rslt2["total_salaespera_dataaforo"];
        }

        if ($total !== $control) : ?>
            <div id="popup">
            <div class="toast mt-5 show p-3 mb-2 bg-danger text-dark alinear" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="mr-auto">Aviso</strong>
                    <button type="button" onclick="cerrar()" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Los números con la sala de espera no coinciden.
                </div>
            </div>
         </div>
    <?php endif;
        
    ?>
</body>
    <script>
        const Minus= document.getElementById('menos')
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
	        xmlhttp.open("POST","salaIngreso.php", true);
	        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	        xmlhttp.send(datasend);
        })

        Minus.addEventListener('click', (e)=> {
            datasend= "valorMenos="+1;

            xmlhttp= new XMLHttpRequest();
	        xmlhttp.onreadystatechange= function(){
		        if(this.readyState==4 && this.status==200){
                    console.log(this.responseText)
                    location.reload()
		        }
	        }
	        xmlhttp.open("POST","salaEgreso.php", true);
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