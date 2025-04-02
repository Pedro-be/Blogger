<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Catalogo de Productos</title>
        <link rel="icon" type="image/png" href="img/logo.png"/>
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/estilos.css" rel="stylesheet"/>
    </head>
    <body>
        <?php
            include("barra_menu.html");
        ?>
        <div class="mt-5 pt-4 container mb-5 py-2">
            <h1>Detalles del Producto</h1>
            <?php
            require_once('php/conexion.php');
            $result = $mysqli->query("select nombre,replace(format(precio,'Currency'),',','.') as precio,
            imagen,descripcion from productos where codigo=" . $_GET["codigo"]);
            $row = $result->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="pt-3 row">
                <img class="card-img-top img-fluid rounded mx-auto d-block" 
                     src="imagenes_productos/<?php echo $row["imagen"]; ?>" 
                     alt="<?php echo $row["nombre"]; ?>" 
                     style="max-width: 300px; height: auto;">
                <h2 class='card-title col-12 pb-2'>
                    <?php echo $row["nombre"] ?>
                </h2>
                <h4 class="col-12">Precio</h4>
                <h5 class="col-12">Gs. <?php echo $row["precio"] ?></h5>
                <p class="card-text col-12 pb-2"><?php echo $row["descripcion"] ?></p>
                <div class="col-12">
                    <form action="php/agregar_carrito.php" method="POST">
                        <input type="hidden" name="codigo" value="<?php echo $_GET['codigo']; ?>">
                        <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                        <input type="hidden" name="precio" value="<?php echo $row['precio']; ?>">
                        <input type="hidden" name="imagen" value="<?php echo $row['imagen']; ?>">
                        <label for="cantidad">Cantidad:</label>
                        <!-- Modificación del campo de cantidad -->
                        <div class="d-flex align-items-center mb-3" style="width: auto;">
                            <button class="btn btn-outline-secondary" type="button" onclick="decrementarCantidad()">-</button>
                            <input type="number" id="cantidad" name="cantidad" value="1" min="1" class="form-control text-center mx-2" style="width: 70px;" required>
                            <button class="btn btn-outline-secondary" type="button" onclick="incrementarCantidad()">+</button>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                            <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9z"></path>
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"></path>
                            </svg><font _mstmutation="1" _msttexthash="78442" _msthash="36"> Agregar </font>
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; 
                    Sitio web Desarrolllado por Pedro Ramirez</p>
            </div>
        </footer>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            // Función para decrementar la cantidad
            function decrementarCantidad() {
                const cantidadInput = document.getElementById('cantidad');
                if (cantidadInput.value > 1) {
                    cantidadInput.value = parseInt(cantidadInput.value) - 1;
                }
            }

            // Función para incrementar la cantidad
            function incrementarCantidad() {
                const cantidadInput = document.getElementById('cantidad');
                cantidadInput.value = parseInt(cantidadInput.value) + 1;
            }
        </script>
    </body>
</html>