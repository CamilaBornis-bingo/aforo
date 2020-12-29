<?php

class BaseMYSQL extends BaseDatos{

    //Conexion a la base de datos
    static public function conexion($host,$db_nombre,$usuario,$password,$puerto,$charset){
        try {
            $dsn = "mysql:host=".$host.";"."dbname=".$db_nombre.";"."port=".$puerto.";"."charset=".$charset;
            $baseDatos = new PDO($dsn,$usuario,$password);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            // echo "Se conectó a la BD";
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No me pude conectar a la BD ". $errores->getmessage();
            exit;
        }
    }

    static public function selectTodo($pdo){
        $sql = "SELECT * FROM data_aforo ORDER BY id_dataaforo DESC LIMIT 1";
        $query = $pdo->prepare($sql);
        $query->execute();
        $datos = $query->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }

    
      public function guardar($registro){

     }
}



 ?>
