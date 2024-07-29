<?php
if (isset($_GET['id'])) {
    include "../modelo/conexion.php";
    
    $id = $_GET['id'];
    $sql = $conexion_juego->prepare("DELETE FROM Videojuegos WHERE id = ?");
    $sql->bind_param("i", $id);

    if ($sql->execute()) {
        header("Location: ../index.php");
    } else {
        echo "Error al eliminar el juego.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
