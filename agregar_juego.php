<?php
include "modelo/conexion.php";

// Obtener el último ID registrado y sumarle 1
$result = $conexion_juego->query("SELECT MAX(id) as max_id FROM Videojuegos");
$row = $result->fetch_assoc();
$new_id = $row['max_id'] + 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Agregar Juego</h1>
    <div class="container">
        <form action="controlador/agregar_juego_proceso.php" method="POST">
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($_GET['error']) ?>
                </div>
            <?php endif; ?>
            
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="number" class="form-control" id="id" name="id" value="<?= htmlspecialchars($new_id) ?>" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Juego</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" required>
            </div>
            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select class="form-control" id="categoria_id" name="categoria_id" required>
                    <?php
                    $categorias = $conexion_categoria->query("SELECT * FROM Categoria");
                    while ($cat = $categorias->fetch_assoc()) {
                        echo "<option value='{$cat['id']}'>{$cat['nombre']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</body>
</html>
