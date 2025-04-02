<?php
require_once('../../../../php/conexion.php');
$codigo = $_POST['codigo'];
$sql = "SELECT * FROM productos WHERE codigo=".$codigo;
$ret = $mysqli->query($sql);
$row = $ret->fetch_array(MYSQLI_ASSOC);
$objeto = new stdClass();
$objeto->mensaje = "Registro encontrado";
$objeto->nombre = $row["nombre"];
$objeto->descripcion = $row["descripcion"];
$objeto->precio = $row["precio"];
$json = json_encode($objeto);
echo($json);