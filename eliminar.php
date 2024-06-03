<?php
// Incluir los archivos necesarios para la conexión y el CRUD
include "./clases/conexion.php";
include "./clases/crud.php";

// Crear una instancia de la clase Crud
$crud = new Crud();

// Obtener el ID enviado por el formulario
$id = $_POST['id'];

// Obtener los datos del documento a eliminar
$datos = $crud->obtenerDocumentos($id);

// Verificar si se obtuvo correctamente el documento
if (is_object($datos)) {
    // Obtener el ID de MongoDB del documento
    $idmongo = $datos->_id;
} else {
    echo "Error al obtener los datos del documento.";
    exit;
}
?>

<?php include "./header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Eliminar canción</h2>
                    <a href="index.php" class="btn btn-info"> <i class="fa-solid fa-chevron-left"></i> Atrás</a>

                    <table class="table table-sm table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Autor</th>
                                <th>Año de Publicación</th>
                                <th>Grupo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $datos->nombre; ?></td>
                                <td><?php echo $datos->autor; ?></td>
                                <td><?php echo $datos->anodepublicacion; ?></td>
                                <td><?php echo $datos->grupo; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>

                    <div class="alert alert-danger" role="alert">
                        <p>Está seguro de eliminar esta canción?</p>
                        <p>Una vez eliminado, no podrá ser recuperado.</p>
                    </div>

                    <form action="./procesos/eliminar.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $idmongo; ?>">
                        <button class="btn btn-danger"> <i class="fa-solid fa-xmark"></i> Eliminar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./scripts.php"; ?>