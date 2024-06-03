<?php 
// Incluir las clases necesarias para la conexión y el CRUD
include "../clases/conexion.php";
include "../clases/crud.php";

// Crear una instancia de la clase CRUD
$crud = new Crud();

// Obtener el ID del documento a actualizar desde el formulario
$id = $_POST['id'];

// Crear un array con los nuevos datos del documento
$datos = array(
    "nombre" => $_POST['nombre'],
    "autor" => $_POST['autor'],
    "anodepublicacion" => $_POST['anodepublicacion'],
    "grupo" => $_POST['grupo']
);

try {
    // Intentar actualizar el documento en la base de datos
    $respuesta = $crud->actualizar($id, $datos);

    // Verificar si la actualización fue exitosa
    if (is_object($respuesta) && method_exists($respuesta, 'getModifiedCount') && ($respuesta->getModifiedCount() > 0 || $respuesta->getMatchedCount() > 0)) {
        // La actualización fue exitosa, redirigir a index.php
        header("location:../index.php");
        exit(); // Terminar el script para evitar que se imprima cualquier cosa adicional
    } else {
        // La actualización falló, mostrar un mensaje de error
        echo "Error al actualizar los datos: " . (is_string($respuesta) ? $respuesta : 'Resultado inesperado');
    }
} catch (\Throwable $th) {
    // Capturar y mostrar cualquier error que ocurra durante la actualización
    echo "Error al actualizar los datos: " . $th->getMessage();
}
?>