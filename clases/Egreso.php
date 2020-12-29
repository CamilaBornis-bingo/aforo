<?php
    class Egreso{

        static public function agregarEgreso($pdo, $post){
            $sql = "SELECT * FROM data_aforo ORDER BY id_dataaforo DESC LIMIT 1";
            $query = $pdo->prepare($sql);
            $query->execute();
            $datos = $query->fetchAll(PDO::FETCH_ASSOC);
            $valMasIngreso = $post['valorMenos'];
    
            foreach ($datos as $key => $dato):
                $total= $dato["total_dataaforo"];
                $total_sp= $dato["total_salaespera_dataaforo"]; 
            endforeach; 
    
                //SE GUARDA EN LA BASE
                if(($total < 500 || $total == 500) && ($total > 0) ){
                    //SE SUMA EL TOTAL CON EL VALOR NUEVO
                    $total_actual= $total - $valMasIngreso;
            
                    $sql= "INSERT INTO data_aforo(egreso_dataaforo, total_dataaforo, total_salaespera_dataaforo) VALUES($valMasIngreso, $total_actual, $total_sp)";
                    $guardarEgreso = $pdo->prepare($sql);
                    $guardarEgreso->execute(); 
                } else {
                    echo 1;
                }
        }

    }

?>