<?php require 'conection.php'; ?>
<?php require 'variables.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías - Almacén</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h2 class="mb-4">🏷️ Listado de Categorías</h2>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-secondary">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT categoria_id, nombre FROM categorias ORDER BY categoria_id ASC";
            $result = mysqli_query($conection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['categoria_id']) ?></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td>
                        <form action="categorias_delete.php" method="post" class="d-inline">
                            <input type="hidden" name="accion" value="eliminar_categorias">
                            <input type="hidden" name="id" value="<?= $row['categoria_id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar esta categoría?');">Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <hr>

    <h4>Añadir nueva categoría</h4>
    <form action="#" method="post" class="row g-3">
        <input type="hidden" name="accion" value="agregar_categorias">
        <div class="col-md-6">
            <input type="text" name="nombre_categoria" class="form-control" placeholder="Nombre categoría" required>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-success w-100">Añadir</button>
        </div>
    </form>

    <div class="mt-4">
        <a href="index.php" class="btn btn-secondary">🔙 Volver</a>
    </div>
</div>
</body>
</html>
