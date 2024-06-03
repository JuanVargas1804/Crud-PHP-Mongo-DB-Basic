<?php
require_once "conexion.php";

class Crud {
    public function mostrardatos() {
        $conexion = new Conexion();
        $db = $conexion->conectar();
        $coleccion = $db->canciones;

        // Realizar la consulta a MongoDB
        $resultados = $coleccion->find();
        
        // Convertir los resultados a un array para su uso en la vista
        return iterator_to_array($resultados);
    }

    public function obtenerDocumentos($id) {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            
            $coleccion = $db->canciones;
            $datos = $coleccion->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
            return $datos;                    
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function eliminar($id) {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $coleccion = $db->canciones;

            $respuesta = $coleccion->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

            return $respuesta;
        } catch (\Throwable $th) {
            return $th->getMessage();    
        }
    }

    public function insertarDatos($datos) {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $coleccion = $db->canciones;
            $resultado = $coleccion->insertOne($datos); 

            return $resultado;
        } catch (\Throwable $th) {
            return $th->getMessage(); 
        }
    }
    
    public function actualizar($id, $datos) {
        try {
            $conexion = new Conexion();
            $db = $conexion->conectar();
            $coleccion = $db->canciones;
            $resultado = $coleccion->updateOne(
                ['_id' => new MongoDB\BSON\ObjectId($id)],
                ['$set' => $datos]
            );

            return $resultado;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
?>