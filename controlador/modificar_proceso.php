<?php
if (isset($_POST['id'])) {
    include "../modelo/conexion.php";
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $categoria_id = $_POST['categoria_id'];

    $sql = $conexion_juego->query("UPDATE Videojuegos SET nombre = '$nombre', fecha_publicacion = '$fecha_publicacion', categoria_id = $categoria_id WHERE id = $id");
    if ($sql) {
        header("Location: ../index.php");
    } else {
        echo "Error al modificar el juego.";
    }
} else {
    echo "ID no proporcionado.";
}
?>

