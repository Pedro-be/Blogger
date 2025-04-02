<?php
require_once('../../../../php/conexion.php');
$offset = ((int) ($_POST['bpagina']) -1 ) * 10;
$result = $mysqli->query("SELECT * FROM publicaciones WHERE titulo
like '%".$_POST['btitulo']."%' LIMIT 10 OFFSET ".$offset );
$tabla = "";
while($row=$result->fetch_array(MYSQLI_ASSOC)) {
    $tabla = $tabla."<tr>"
        ."<td>".$row["id"]."</td>"
        ."<td>".$row["titulo"]."</td>"
        ."<td><img src='../../../imagenes_publicaciones/".$row["imagen"]."' width='50'></td>"
        ."</tr>";
}

if ($tabla=="") {
    $tabla="<tr><td colspan='3'>No hay registros..</td></tr>";
}

$objeto = new stdClass();
$objeto->mensaje = "Datos encontrados";
$objeto->contenido = $tabla;
$json = json_encode($objeto);
echo ($json);