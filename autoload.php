<?php
    $capacidad_max_sala= 500;
    $capacidad_max_sp= 100;
    $vers= 0.06;

    require_once("../clases/BaseDeDatos.php");
    require_once("../clases/BaseMySQL.php");
    require_once("../clases/Ingreso.php");
    require_once("../clases/Egreso.php");
    require_once("../clases/SalaEspera.php");
    require_once("../clases/Reporte.php");

    $host = "192.168.2.10";
    $bd = "aforo";
    $usuario = "root";
    $password = "";
    $puerto = "3306";
    $charset = "utf8mb4";



    //Se crea la conexion a la base de datos
    $pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);

?>