<?php
if (isset($_GET['id'])) {
    include "../modelo/conexion.php";
    $id = $_GET['id'];
    $sql = $conexion_categoria->query("DELETE FROM Categoria WHERE id = $id");
    if ($sql) {
        header("Location: ../ver_generos.php");
    } else {
        echo "Error al eliminar el genero.";
    }
} else {
    echo "ID no proporcionado.";
}
?>
