<?php
    class SalaEspera{

        static public function descartarSP($pdo, $post){
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
                if($total < 500){
                    //SE SUMA EL TOTAL CON EL VALOR NUEVO
                    if ($total_sp >= 1) {
                        $total_sala= $total + $valMasIngreso;
                        $total_salaespera= $total_sp - $valMasIngreso;
                
                        $sql= "INSERT INTO data_aforo(egreso_dataaforo, total_dataaforo, total_salaespera_dataaforo) VALUES($valMasIngreso, $total_sala, $total_salaespera)";
                        $egresoSP = $pdo->prepare($sql);
                        $egresoSP->execute(); 
                    }
            
                } else if($total >= 500) { 
                    echo 1;
                } else {
                    echo 1;
                }
        }

    }

?>