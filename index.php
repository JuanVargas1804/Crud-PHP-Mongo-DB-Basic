<?php 
require_once "./clases/conexion.php"; // Incluir el archivo de conexión a la base de datos
require_once "./clases/crud.php"; // Incluir el archivo que contiene las operaciones CRUD

$crud = new Crud(); // Crear una instancia de la clase Crud
$datos = $crud->mostrardatos(); // Obtener todos los datos de la colección de canciones
?>

<?php include "./header.php"; // Incluir el archivo de la cabecera ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Crud con mongodb y PhP</h2>
                    <a href="agregarcancion.php" class="btn btn-primary">
                        <i class="fa-solid fa-music"></i> Agregar Nueva Canción
                    </a>

                    <hr>

                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Autor</th>
                                <th class="text-center">Año de Publicación</th>
                                <th class="text-center">Grupo</th>
                                <th class="text-center">Editar</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($datos as $item) { // Iterar sobre cada documento de la colección de canciones ?>
                                <tr>
                                    <td><?php echo $item['nombre']; ?></td>
                                    <td><?php echo $item['autor']; ?></td>
                                    <td><?php echo $item['anodepublicacion']; ?></td>
                                    <td><?php echo $item['grupo']; ?></td>
                                    <td class="text-center">
                                        <form action="actualizar.php" method="post">
                                            <input type="text" hidden value="<?php echo $item->_id; ?>" name="id">
                                            <button class="btn btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <form action="eliminar.php" method="post">
                                            <input type="text" hidden value="<?php echo $item->_id; ?>" name="id">
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./scripts.php"; // Incluir el archivo de scripts ?>
