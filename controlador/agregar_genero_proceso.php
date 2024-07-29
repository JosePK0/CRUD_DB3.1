<?php
include "../modelo/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']); 
    $nombre = $conexion_categoria->real_escape_string($_POST['nombre']); 

   
    $result = $conexion_categoria->query("SELECT COUNT(*) as count FROM Categoria WHERE id = $id");
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        
        header("Location: ../agregar_genero.php?error=El+ID+ya+existe.+Por+favor,+elige+otro+ID.");
        exit();
    } else {
        
        $sql = "INSERT INTO Categoria (id, nombre) VALUES ($id, '$nombre')";
        if ($conexion_categoria->query($sql)) {
            header("Location: ../index.php");
            exit(); 
        } else {
            header("Location: ../agregar_generoo.php?error=Error+al+agregar+el+género.");
            exit();
        }
    }
}
?>
