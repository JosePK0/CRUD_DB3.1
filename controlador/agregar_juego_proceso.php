<?php
include "../modelo/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']); 
    $nombre = $conexion_juego->real_escape_string($_POST['nombre']); 
    $fecha_publicacion = $conexion_juego->real_escape_string($_POST['fecha_publicacion']);
    $categoria_id = intval($_POST['categoria_id']);

 
    $result_id = $conexion_juego->query("SELECT COUNT(*) as count FROM Videojuegos WHERE id = $id");
    $row_id = $result_id->fetch_assoc();

    
    $result_nombre = $conexion_juego->query("SELECT COUNT(*) as count FROM Videojuegos WHERE nombre = '$nombre'");
    $row_nombre = $result_nombre->fetch_assoc();

    if ($row_id['count'] > 0) {
       
        header("Location: ../agregar_juego.php?error=El+ID+ya+existe.+Por+favor,+elige+otro+ID.");
        exit();
    } elseif ($row_nombre['count'] > 0) {
        
        header("Location: ../agregar_juego.php?error=El+nombre+del+juego+ya+existe.+Por+favor,+elige+otro+nombre.");
        exit();
    } else {
        
        $sql = "INSERT INTO Videojuegos (id, nombre, fecha_publicacion, categoria_id) VALUES ($id, '$nombre', '$fecha_publicacion', $categoria_id)";
        if ($conexion_juego->query($sql)) {
            header("Location: ../index.php");
            exit(); 
        } else {
            header("Location: ../agregar_juego.php?error=Error+al+agregar+el+juego.");
            exit();
        }
    }
}
?>
