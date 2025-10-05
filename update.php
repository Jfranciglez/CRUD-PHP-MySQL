<?php require 'conection.php'; ?>
<?php require 'variables.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="container py-4">

    <?php
    if ($accion === "actualizar") {
        $actualizar = "UPDATE productos SET 
            nombre='$nombre', 
            categoria_id='$categoria_id', 
            precio='$precio', 
            stock='$stock' 
            WHERE id='$idAntiguo'";

        mysqli_query($conection, $actualizar);
        echo "<div class='alert alert-success'>Producto actualizado correctamente.</div>";
    }
    ?>

    <h2>Modificar producto</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = mysqli_query($conection, "SELECT id, nombre, categoria_id, precio, stock FROM productos");

            while ($registro = mysqli_fetch_array($consulta)) {
                if ($accion == 'modificar' && $id == $registro['id']) {
            ?>
                    <tr class="table-warning">
                        <form action="#" method="post">
                            <td><?= $registro["id"] ?></td>
                            <td><input type="text" name="nombre" value="<?= $registro["nombre"] ?>" required></td>
                            <td>
                                <select name="categoria_id" required>
                                    <option value="">Selecciona</option>
                                    <?php
                                    $categorias = mysqli_query($conection, "SELECT categoria_id, nombre FROM categorias");
                                    while ($cat = mysqli_fetch_array($categorias)) {
                                        $selected = ($cat['categoria_id'] == $registro['categoria_id']) ? 'selected' : '';
                                        echo "<option value='{$cat['categoria_id']}' $selected>{$cat['nombre']}</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td><input type="number" name="precio" step="0.01" value="<?= $registro["precio"] ?>" required></td>
                            <td><input type="number" name="stock" value="<?= $registro["stock"] ?>" required></td>
                            <td>
                                <input type="hidden" name="accion" value="actualizar">
                                <input type="hidden" name="idAntiguo" value="<?= $registro["id"] ?>">
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="bi bi-check-circle"></i> Aceptar
                                </button>
                            </td>
                        </form>
                        <td>
                            <form action="#" method="post">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-x-lg"></i> Cancelar
                                </button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <a href="list.php" class="btn btn-secondary mt-3">
        <i class="bi bi-arrow-left-circle"></i> Volver
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
