<?php
    class Reporte{
        static public function reporteFechas($pdo, $post){
            $desde = $post["fecha_desde"];
        
            $sql = "SELECT * FROM data_aforo WHERE fechahora_dataaforo BETWEEN '$desde 00:00:00' AND '$desde 23:59:59'";
            $query = $pdo->prepare($sql);
            $query->execute();
            $datos = $query->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }

        static public function totalxDia($pdo, $post){
            $desde = $post["fecha_desde"];
        
            $sql = "SELECT sum(ingreso_dataaforo) as total, sum(egreso_dataaforo) as egreso FROM data_aforo WHERE fechahora_dataaforo BETWEEN '$desde 00:00:00' AND '$desde 23:59:59'";
            $query = $pdo->prepare($sql);
            $query->execute();
            $datos = $query->fetchAll(PDO::FETCH_ASSOC);

            return $datos;
        }

        
    }

?>