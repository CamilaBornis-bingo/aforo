<?php
class Ingreso {

    static public function agregarIngreso($pdo, $post){
        $sql = "SELECT * FROM data_aforo ORDER BY id_dataaforo DESC LIMIT 1";
        $query = $pdo->prepare($sql);
        $query->execute();
        $datos = $query->fetchAll(PDO::FETCH_ASSOC);
        $valMasIngreso = $post['valorMas'];

        foreach ($datos as $key => $dato):
            $total= $dato["total_dataaforo"];
            $total_sp= $dato["total_salaespera_dataaforo"]; 
        endforeach; 


        if($total < 500){
            if ($total_sp > 0) {
                $total_actual= $total_sp + $valMasIngreso;
    
                $sql= "INSERT INTO data_aforo(ingreso_dataaforo, total_dataaforo, total_salaespera_dataaforo) VALUES($valMasIngreso, $total, $total_actual)";
                $guardarIngreso = $pdo->prepare($sql);
                $guardarIngreso->execute(); 
            } else {
                //SE SUMA EL TOTAL CON EL VALOR NUEVO
                $total_actual= $total + $valMasIngreso;
        
                $sql= "INSERT INTO data_aforo(ingreso_dataaforo, total_dataaforo) VALUES($valMasIngreso, $total_actual)";
                $guardarIngreso = $pdo->prepare($sql);
                $guardarIngreso->execute(); 
            }
        } else if($total >= 500 && $total_sp < 100) {
            $total_actual= $total_sp + $valMasIngreso;
    
            $sql= "INSERT INTO data_aforo(ingreso_dataaforo, total_dataaforo, total_salaespera_dataaforo) VALUES($valMasIngreso, $total, $total_actual)";
            $guardarIngreso = $pdo->prepare($sql);
            $guardarIngreso->execute();        
        } else if($total == 500 && $total_sp == 100) {
            echo 1;
        }
    }


}

?>