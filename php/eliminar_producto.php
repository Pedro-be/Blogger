<?php
session_start();

if (isset($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    // Buscar y eliminar el producto del carrito
    foreach ($_SESSION['carrito'] as $indice => $producto) {
        if ($producto['codigo'] == $codigo) {
            unset($_SESSION['carrito'][$indice]);
            break;
        }
    }

    // Reindexar el array del carrito
    $_SESSION['carrito'] = array_values($_SESSION['carrito']);
}

// Redirigir al carrito
header('Location: ../carrito.php');
exit;
?>
