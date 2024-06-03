<?php include "./header.php"; // Incluir el archivo de la cabecera ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-body">
                    <h2>Agregar nueva canción</h2>
                    <a href="index.php" class="btn btn-info"> 
                        <i class="fa-solid fa-chevron-left"></i> Atrás
                    </a>

                    <!-- Formulario para agregar una nueva canción -->
                    <form action="./procesos/insertar.php" method="post">
                        
                        <!-- Campo para el nombre de la canción -->
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>

                        <!-- Campo para el autor de la canción -->
                        <label for="autor">Autor</label>
                        <input type="text" class="form-control" id="autor" name="autor" required>

                        <!-- Campo para el año de publicación de la canción -->
                        <label for="anodepublicacion">Anodepublicacion</label>
                        <input type="date" class="form-control" id="anodepublicacion" name="anodepublicacion" required>

                        <!-- Campo para el grupo de la canción -->
                        <label for="grupo">Grupo</label>
                        <input type="text" class="form-control" id="grupo" name="grupo" required>
                        
                        <!-- Campo para el grupo de la canción -->
                        <label for="grupo">Archivo</label>
                        <input type="file" class="form-control" id="archivo" name="archivo" required>


                        <!-- Botón para enviar el formulario -->
                        <button class="btn btn-primary mt-3">
                            <i class="fa-solid fa-floppy-disk"></i> Agregar 
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include "./scripts.php"; // Incluir el archivo de scripts ?>
