<?php
include "modelo/conexion.php";


$categoria_query = $conexion_categoria->query("SELECT * FROM Categoria");
$categorias = [];
while ($categoria = $categoria_query->fetch_assoc()) {
    $categorias[$categoria['id']] = $categoria['nombre'];
}


$sql = "SELECT id, nombre, fecha_publicacion, categoria_id FROM Videojuegos";
$result = $conexion_juego->query($sql);
if (!$result) {
    die("Error en la consulta: " . $conexion_juego->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b8c5ba2a6e.js" crossorigin="anonymous"></script>
    <script>
        function eliminar() {
            return confirm("¿Estás seguro de que quieres eliminar?");
        }
    </script>
</head>
<body>
    <h1 class="text-center">CRUD Videojuegos</h1>
    <div class="container-fluid row">
        <div class="col-12 mb-3">
            <a href="agregar_juego.php" class="btn btn-primary">Agregar Juego</a>
            <a href="agregar_genero.php" class="btn btn-secondary">Agregar Género</a>
            <a href="ver_generos.php" class="btn btn-info">Ver Géneros</a>
        </div>
        <div class="col-12 p-4">
            <table class="table">
                <thead class="bg-info text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha de Publicación</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($datos = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $datos['id'] ?></td>
                            <td><?= $datos['nombre'] ?></td>
                            <td><?= $datos['fecha_publicacion'] ?></td>
                            <td>
                                <?= isset($categorias[$datos['categoria_id']]) ? $categorias[$datos['categoria_id']] : 'Categoría eliminada' ?>
                            </td>
                            <td>
                                <a href="modificar.php?id=<?= $datos['id'] ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a onclick="return eliminar()" href="controlador/eliminar.php?id=<?= $datos['id'] ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-square-minus"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
