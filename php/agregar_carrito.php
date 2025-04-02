<?php
session_start();

// Verificar si el carrito ya existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Obtener los datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$imagen = $_POST['imagen'];
$cantidad = $_POST['cantidad'];

// Verificar si el producto ya está en el carrito
$producto_existente = false;
foreach ($_SESSION['carrito'] as &$producto) {
    if ($producto['codigo'] == $codigo) {
        $producto['cantidad'] += $cantidad;
        $producto_existente = true;
        break;
    }
}

// Si el producto no existe, agregarlo al carrito
if (!$producto_existente) {
    $_SESSION['carrito'][] = [
        'codigo' => $codigo,
        'nombre' => $nombre,
        'precio' => $precio,
        'imagen' => $imagen,
        'cantidad' => $cantidad
    ];
}

// Redirigir al detalle del producto o al carrito
header('Location: ../producto_detalle.php?codigo=' . $codigo);
exit;
?>