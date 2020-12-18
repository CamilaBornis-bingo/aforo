<?php
include_once("conexion.php");

    if(isset($_POST["npag"])==false){
        $npag=0;
    } else {
        $npag= $_POST["npag"] * 5;
    }

    $sql = "SELECT * FROM data_aforo WHERE fechahora_dataaforo BETWEEN '2020-12-14 10:00:00' AND '2020-12-18 05:00:00' LIMIT $npag, 5";
    $qry= mysqli_query($conn, $sql);
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
    <div class="container-fluid alinear">
        <table border=1> 
            <tr>
                <td>Ingresos</td>
                <td>Egresos</td>
                <td>Total</td>
                <td>Sala de espera</td>
                <td>Fecha y hora</td>
            </tr>
            <?php
            // $aux = 0;
            // $ingreso = 0;
            // $egreso = 0;
                while($rslt= mysqli_fetch_array($qry)) { 
                    // $total = $rslt['total_dataaforo'];
                    // if ($total < $aux) {
                    //     $ingreso++;
                    //     $aux = $total;
                    // } else {
                    //     $egreso++;
                    //     $aux = $total;
                    // }
                    ?>
                    <tr>
                        <td><?=$rslt['ingreso_dataaforo']?></td>
                        <td><?=$rslt['egreso_dataaforo']?></td>
                        <td><?=$rslt['total_dataaforo']?></td>
                        <td><?=$rslt['total_salaespera_dataaforo']?></td>
                        <td><?=$rslt['fechahora_dataaforo']?></td>
                    </tr>
        <?php } 
        ?>
        </table>
    </div>
    
<?php 
    $sql_c= "SELECT COUNT(*) AS paginas FROM data_aforo";
	$qry_c= mysqli_query($conn, $sql_c);
	$rslt_c= mysqli_fetch_assoc($qry_c);

	$tot_pag= ceil($rslt_c["paginas"]/5);

	echo "<center>";
	for($i=1; $i <= $tot_pag; $i++){
		echo "<input type='button' value='$i' id='pag'>";
    }
    echo "</center>";
    ?>

<script>
    window.onload= function(){
        let pagina = document.getElementById('pag');

        pagina.addEventListener("click", function(){
            var jx_npag= event.target.value;
        
            var data= "npag="+jx_npag;
        
            var xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange= function(){
                if(this.readyState==4 && this.status==200){
                    document.getElementById("content-arti").innerHTML= this.responseText;
                    alert(data);
                }
            }
            xmlhttp.open("POST", "prueba.php", true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send(data);
        })
    }
</script>
</body>
</html>
