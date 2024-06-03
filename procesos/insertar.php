<?php 
    include "../clases/conexion.php";
    include "../clases/crud.php";

    $crud = new Crud();

    $datos = array(
        "nombre" => $_POST['nombre'],
        "autor" => $_POST['autor'],
        "anodepublicacion" => $_POST['anodepublicacion'],
        "grupo" => $_POST['grupo'],
        "archivo" => $_POST['archivo']

    );

    try {
        $respuesta = $crud->insertarDatos($datos);

        if ($respuesta->getInsertedCount() > 0) {
            // La inserción fue exitosa, redirige al index.php
            header("location:../index.php");
            exit(); // Termina el script para evitar que se imprima cualquier cosa adicional
        } else {
            // La inserción falló, muestra un mensaje de error
            echo "Error al insertar datos en la base de datos";
        }
    } catch (\Throwable $th) {
        echo "Error al insertar datos en la base de datos: " . $th->getMessage();
    }
?>