<?php
include "modelo/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver y Eliminar Géneros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b8c5ba2a6e.js" crossorigin="anonymous"></script>
    <script>
        function eliminar() {
            return confirm("¿Estás seguro de que quieres eliminar?");
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center">Ver y Eliminar Géneros</h1>
        <a href="agregar_genero.php" class="btn btn-success mb-3">Agregar Género</a>
        <a href="index.php" class="btn btn-primary mb-3">Volver al Inicio</a>
        <table class="table">
            <thead class="bg-info text-white">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sql = $conexion_categoria->query("SELECT * FROM Categoria ORDER BY id ASC");
                if ($sql === false) {
                    echo "Error en la consulta: " . $conexionCategoria->error;
                } else {
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td>
                                <a onclick="return eliminar()" href="controlador/eliminar_genero.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-square-minus"></i></a>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

