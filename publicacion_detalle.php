<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalle de la publicacion</title>
        <link rel="icon" type="image/png" href="img/logo.png"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("barra_menu.html");
        ?>
        <div class="container mt-5 mb-5 pt-4">
            <h1>Detalle de Publicación</h1>
            <?php
            require_once('php/conexion.php');
            $result = $mysqli->query("select titulo,contenido,imagen
                from publicaciones 
                where id=".$_GET["codigo"]);
            $row = $result->fetch_array(MYSQLI_ASSOC)
            ?>
            <div class="row">
                <!-- Imagen de la publicación -->
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top img-fluid rounded" 
                             src="imagenes_publicaciones/<?php echo $row['imagen']; ?>" 
                             alt="<?php echo $row['titulo']; ?>">
                    </div>
                </div>

                <!-- Detalles de la publicación -->
                <div class="col-md-6">
                    <div class="card-body">
                        <h2 class="card-title text-primary">
                            <?php echo $row['titulo']; ?>
                        </h2>
                        <p class="card-text mt-3">
                            <?php echo nl2br($row['contenido']); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; 
                    Sitio web Desarrolllado por Pedro Ramirez</p>
            </div>
        </footer>
    </body>
    <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/funciones.js"></script>
</html>