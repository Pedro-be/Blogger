<?php
require_once('../../../../php/conexion.php');
$id = $_POST['id'];
$ruta = "../../../../imagenes_publicaciones/"; //ruta carpeta
$sql = "SELECT Imagen FROM publicaciones WHERE id=" . $id;
$ret2 = $mysqli->query($sql);
$row = $ret2->fetch_array(MYSQLI_ASSOC);
$nombre_viejo = $row["Imagen"];
$sql = "DELETE FROM publicaciones WHERE id=" . $id;
$ret = $mysqli->query($sql);
$res = "Registro NO eliminado";
if ($ret == 1) {
    unlink($ruta . $nombre_viejo);
    $res = "Registro eliminado";

}
echo($res);