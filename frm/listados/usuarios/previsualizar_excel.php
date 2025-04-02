<?php
require_once('../../../php/conexion.php');
$desdeid = $_GET['d'];
$hastaid = $_GET['h'];
$previsualizar = $_GET['pre'];
if ($previsualizar == "no") {
    date_default_timezone_set('America/Asuncion');
    $nombre="excel".date("d_m_Y_").date("H_i").".xls";
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename='.$nombre.';');
    /* recuerda cambiar tu extension a la q estas tomando xls, txt,etc */
}
$consulta = "SELECT * FROM usuarios WHERE cod_usuario>=$desdeid AND cod_usuario<=$hastaid";
$resEmp = $mysqli->query($consulta);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>IDT</h1>
    <h2>Ejemplo de Excel con PHP Y MYSQL</h2>
    <table border="1">
        <tr><td>Codigo</td><td>Nombre</td></tr>
        <?php
            while ($row = $resEmp->fetch_array(MYSQLI_ASSOC)) {
        ?>
            <tr>
                <td align="right">
                    <?php
                        echo $row["cod_usuario"];
                    ?>
                </td>
                <td align="right">
                    <?php
                        echo $row["nombre_usuario"];
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>