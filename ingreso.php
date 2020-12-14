
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

        $sql= "SELECT * FROM data_aforo ORDER BY id_dataaforo DESC LIMIT 1 ";
        $qry= mysqli_query($conn, $sql);

        while($rslt= mysqli_fetch_array($qry)) {
            $total= $rslt["total_dataaforo"];
            $total_sp= $rslt["total_salaespera_dataaforo"];
            
            if($total == NULL) {
                echo '<div class="container alinear-2 display-1">
                      <div class="card bg-secondary mb-3" style="max-width: 35rem"> 
                        <div class="card-header text-center"> 000 / 500</div>
                        <div class="card-header text-center">  00 / 60</div>
                    <div class="card-body">
                        <img src="img/plus_64.png" id="mas" class="icon-64"/>
                        <img src="img/minus_32.png" id="menos" class="icon-32"/>                                          
                    </div>
                    </div>
                    </div>';
            } else {
                echo '
                    <div class="container alinear-2 display-1">
                    <div class="card bg-secondary mb-3" style="max-width: 35rem"> 
                    <div class="card-header text-center">'.$total.' / '.$capacidad_max_sala.'</div>
                    <div class="card-header text-center">'.$total_sp.' / '.$capacidad_max_sp.'</div>
                    <div class="card-body">
                        <img src="img/plus_64.png" id="mas" class="icon-64"/>
                        <img src="img/minus_32.png" id="menos" class="icon-32"/>                                          
                    </div>
                    </div>
                    </div>
                ';
            }
        }
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
	        xmlhttp.open("POST","masIngreso.php", true);
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
	        xmlhttp.open("POST","menosEgreso.php", true);
	        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	        xmlhttp.send(datasend);
        })

        setTimeout(() => {
            location.reload()
        }, 5000);
    </script>
</html>