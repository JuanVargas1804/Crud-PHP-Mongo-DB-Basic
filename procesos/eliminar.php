<?php 
// Incluir las clases necesarias para la conexión y el CRUD
include "../clases/conexion.php";
include "../clases/crud.php";

// Crear una instancia de la clase CRUD
$crud = new Crud();

// Obtener el ID del documento a eliminar desde el formulario
$id = $_POST['id'];

try {
    // Intentar eliminar el documento de la base de datos
    $respuesta = $crud->eliminar($id);

    // Verificar si la eliminación fue exitosa
    if ($respuesta->getDeletedCount() > 0) {
        // La eliminación fue exitosa, redirigir a index.php
        header("location:../index.php");
        exit(); // Terminar el script para evitar que se imprima cualquier cosa adicional
    } else { 
        // La eliminación falló, mostrar el objeto de respuesta para depuración
        print_r($respuesta);
    }
} catch (\Throwable $th) {
    // Capturar y mostrar cualquier error que ocurra durante la eliminación
    echo "Error al eliminar el documento: " . $th->getMessage();
}
?>
