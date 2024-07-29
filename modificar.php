<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">Modificar Juego</h1>
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            include "modelo/conexion.php";
            $id = $_GET['id'];
            $sql = $conexion_juego->query("SELECT * FROM Videojuegos WHERE id = $id");
            $juego = $sql->fetch_object();
        } else {
            header("Location: index.php");
        }
        ?>
        <form action="controlador/modificar_proceso.php" method="POST">
            <input type="hidden" name="id" value="<?= $juego->id ?>">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Juego</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $juego->nombre ?>" required>
            </div>
            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" value="<?= $juego->fecha_publicacion ?>" required>
            </div>
            <div class="mb-3">
                <label for="categoria_id" class="form-label">Categoría</label>
                <select class="form-control" id="categoria_id" name="categoria_id" required>
                    <?php
                    $categorias = $conexion_categoria->query("SELECT * FROM Categoria");
                    while ($cat = $categorias->fetch_assoc()) {
                        $selected = $cat['id'] == $juego->categoria_id ? "selected" : "";
                        echo "<option value='{$cat['id']}' $selected>{$cat['nombre']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    </div>
</body>
</html>
