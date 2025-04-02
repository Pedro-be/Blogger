<?php
require_once('../../../../php/conexion.php');
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$ruta = "../../../../imagenes_publicaciones/";
$uploadfile_temporal = $_FILES['Imagen']['tmp_name'];
$uploadfile_nombre = uniqid().$_FILES['Imagen']['name'];
$sql = "SELECT Imagen FROM publicaciones WHERE id=" . $id;
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$nombre_viejo = $row["Imagen"];
if ($uploadfile_temporal == "") {
    $sql = "UPDATE publicaciones SET titulo='$titulo',
    contenido='$contenido' WHERE id='$id'";
} else {
    $sql = "UPDATE publicaciones SET titulo='$titulo',
    contenido='$contenido',
    Imagen='$uploadfile_nombre' WHERE id='$id'";
}
$ret = $mysqli->query($sql);
$res = "Registro No modificado";
if ($ret == 1) {
    $res = "Registro Modificado Correctamente";
    if ($uploadfile_temporal != "") {
        unlink($ruta . $nombre_viejo);
    }
    if (is_uploaded_file($uploadfile_temporal)) {
        move_uploaded_file($uploadfile_temporal, $ruta . $uploadfile_nombre);
    }
}
echo($res);