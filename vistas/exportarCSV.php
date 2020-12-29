<?php

include_once("../autoload.php");
    
    $datos = Reporte::reporteFechas($pdo, $_GET); 

    $delimiter = ",";
    $filename = "aforo_" . $_GET['fecha_desde'] . ".csv";
    
    $f = fopen('php://memory', 'w');

    $fields = array('Ingresos', 'Egresos', 'Total', 'Total Sala espera', 'Fecha y hora'); 
    fputcsv($f, $fields, $delimiter);
    

    foreach ($datos as $key => $value) :
            $lineData = array($value['ingreso_dataaforo'], $value['egreso_dataaforo'], $value['total_dataaforo'], $value['total_salaespera_dataaforo'], $value['fechahora_dataaforo']);
            fputcsv($f, $lineData, $delimiter);
    endforeach;

    fseek($f, 0);
    

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    fpassthru($f);
?>
