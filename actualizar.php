<?php 
// Incluir las clases necesarias para la conexión y el CRUD
include "./clases/conexion.php";
include "./clases/crud.php";

// Crear una instancia de la clase CRUD
$crud = new Crud();

// Obtener el ID de la canción a actualizar desde el formulario
$id = $_POST['id'];

// Obtener los datos del documento correspondiente al ID proporcionado
$datos = $crud->obtenerDocumentos($id);

// Almacenar el ID del documento para su uso en el formulario
$idmongo = $datos->_id;

?>

<?php include "./header.php"; // Incluir el archivo de la cabecera ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Actualizar canción</h2>
                    <a href="index.php" class="btn btn-info">
                        <i class="fa-solid fa-chevron-left"></i> Atrás
                    </a>

                    <!-- Formulario para actualizar la canción -->
                    <form action="./procesos/actualizar.php" method="post">
                        <!-- Campo oculto para enviar el ID del documento -->
                        <input type="hidden" value="<?php echo $idmongo; ?>" name="id">

                        <!-- Campo para el nombre de la canción -->
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos->nombre; ?>">

                        <!-- Campo para el autor de la canción -->
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $datos->autor; ?>">

                        <!-- Campo para el año de publicación de la canción -->
                        <label for="anodepublicacion">Año de Publicación</label>
                        <input type="text" class="form-control" id="anodepublicacion" name="anodepublicacion" value="<?php echo $datos->anodepublicacion; ?>">

                        <!-- Campo para el grupo de la canción -->
                        <label for="grupo">Grupo</label>
                        <input type="text" class="form-control" id="grupo" name="grupo" value="<?php echo $datos->grupo; ?>">

                        <!-- Botón para enviar el formulario de actualización -->
                        <button class="btn btn-warning mt-3">
                            <i class="fa-solid fa-pen"></i> Actualizar
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./scripts.php"; // Incluir el archivo de scripts ?>