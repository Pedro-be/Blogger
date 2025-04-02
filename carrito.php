<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include("barra_menu.html"); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Carrito de Compras</h1>
        <?php if (!empty($_SESSION['carrito'])): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_general = 0;
                    foreach ($_SESSION['carrito'] as $producto):
                        $total_producto = $producto['precio'] * $producto['cantidad'];
                        $total_general += $total_producto;
                    ?>
                        <tr>
                            <td><img src="imagenes_productos/<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" width="50"></td>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td>Gs. <?php echo number_format($producto['precio'], 2, ',', '.'); ?></td> <!-- Precio con 2 decimales -->
                            <td><?php echo $producto['cantidad']; ?></td>
                            <td>Gs. <?php echo number_format($total_producto, 2, ',', '.'); ?></td> <!-- Total del producto con 2 decimales -->
                            <td>
                                <form action="php/eliminar_producto.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="codigo" value="<?php echo $producto['codigo']; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" class="text-right"><strong>Total General:</strong></td>
                        <td colspan="2">Gs. <?php echo number_format($total_general, 2, ',', '.'); ?></td> <!-- Total general con 2 decimales -->
                    </tr>
                </tfoot>
            </table>
            <a href="index.php" class="btn btn-success">Finalizar Compra</a>
        <?php else: ?>
            <p class="alert alert-warning">El carrito está vacío.</p>
        <?php endif; ?>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>