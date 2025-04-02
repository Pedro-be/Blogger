<?php
require_once('../../../../php/conexion.php');
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
//ruta carpeta donde queremos copiar las imágenes
$ruta = "../../../../imagenes_productos/";
$uploadfile_temporal = $_FILES['imagen'] ['tmp_name'];
$uploadfile_nombre = uniqid().$_FILES['imagen']['name'];
$sql = "insert into productos (nombre,descripcion,precio,imagen)
    VALUES ('$nombre','$descripcion','$precio','$uploadfile_nombre')";
$ret = $mysqli->query($sql);
$res = "Registro no guardado";
if ($ret == 1) {
    if (is_uploaded_file($uploadfile_temporal)) {
        move_uploaded_file($uploadfile_temporal, $ruta.$uploadfile_nombre);
    }
    $res = "Registro guardado";
}
echo $res;                                             