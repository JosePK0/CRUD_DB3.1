<?php
include "modelo/conexion.php";


$result = $conexion_categoria->query("SELECT MAX(id) as max_id FROM Categoria");
$row = $result->fetch_assoc();
$new_id = $row['max_id'] + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Género</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form class="col-4 p-3 m-auto" method="POST" action="controlador/agregar_genero_proceso.php">
        <h3 class="text-center text-info">Agregar Género</h3>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="number" class="form-control" name="id" value="<?= $new_id ?>" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary" name="btAgregarGenero" value="ok">Agregar</button>
    </form>
</body>
</html>
