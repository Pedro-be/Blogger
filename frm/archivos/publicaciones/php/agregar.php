<?php
require_once('../../../../php/conexion.php');
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
//ruta carpeta donde queremos copiar las imágenes
$ruta = "../../../../imagenes_publicaciones/";
$uploadfile_temporal = $_FILES['Imagen'] ['tmp_name'];
$uploadfile_nombre = uniqid().$_FILES['Imagen']['name'];
$sql = "insert into publicaciones (titulo,contenido,Imagen)
    VALUES ('$titulo','$contenido','$uploadfile_nombre')";
$ret = $mysqli->query($sql);
$res = "Registro no guardado";
if ($ret == 1) {
    if (is_uploaded_file($uploadfile_temporal)) {
        move_uploaded_file($uploadfile_temporal, $ruta.$uploadfile_nombre);
    }
    $res = "Registro guardado";
}
echo $res;