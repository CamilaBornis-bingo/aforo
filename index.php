<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="libs/bootstrap.min.css"/>
    <link rel="stylesheet" href="general.styles.css"/>
    <title>AppForo</title>
    <script src="app.js"></script>
</head>
<body>
    <nav class="container-fluid navbar navbar-dark bg-dark">
    <div class="container">
        <div class="row">
            <a class="navbar-brand" href="index.php">Bingo Oasis APP | vers <?php include "config.php"; echo $vers; ?></p></a>
        </div>
        <a href="reporte.php" id="reportes"><img src="img/file.png" id="mas" class="icon-64"/></a>
    </div>

    </nav>

    <div class="container-fluid alinear">
    <div class="card bg-secondary mb-3" style="max-width: 20rem"> 
        <div class="card-header text-center">AFORO</div>
        <div class="card-body">
            <a href="ingreso.php"><button type="button" class="btn btn-primary btn-lg btn-block">Ingreso</button></a> <br>
            <a href="egreso.php"><button type="button" class="btn btn-primary btn-lg btn-block">Egreso</button></a> <br>
            <a href="monitor.php"><button type="button" class="btn btn-primary btn-lg btn-block">Monitor</button></a> <br>
            <a href="salaespera.php"><button type="button" class="btn btn-primary btn-lg btn-block">Sala Espera</button></a> <br>
        </div>
    </div>
    </div>

</body>
<footer>
    <p class="lead col mt-4">
        Powered by <a href="">Sistemas IT™</a>
    </p>    
</footer>
</html>