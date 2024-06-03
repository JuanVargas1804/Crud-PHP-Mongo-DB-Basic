<?php 
require_once __DIR__ . '/../vendor/autoload.php';

class Conexion {
    public function conectar() {
        try {
            $servidor = "localhost";
            $usuario = "juanandresvg1804%40gmail.com"; // Codificado el '@' como '%40'
            $password = "30237186vjuan";
            $db = "crud";
            $puerto = "27017";

            $cadenaConexion = "mongodb://localhost:27017/";

            $cliente = new MongoDB\Client($cadenaConexion);

            return $cliente->selectDatabase($db);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}