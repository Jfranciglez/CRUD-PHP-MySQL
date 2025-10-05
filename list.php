<?php require 'conection.php'; ?>
<?php require 'variables.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Almacén</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h2 class="mb-4">📦 Listado de Productos</h2>

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio (€)</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT p.id, p.nombre, c.nombre AS categoria, p.precio, p.stock
                      FROM productos p
                      LEFT JOIN categorias c ON p.categoria_id = c.categoria_id
                      ORDER BY p.id ASC";
            $result = mysqli_query($conection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= htmlspecialchars($row['categoria']) ?></td>
                    <td><?= number_format($row['precio'], 2) ?></td>
                    <td><?= htmlspecialchars($row['stock']) ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                        <form action="delete.php" method="post" class="d-inline">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Eliminar este producto?');">Eliminar
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

    <h4>Añadir nuevo producto</h4>
    <form action="#" method="post" class="row g-3">
        <input type="hidden" name="accion" value="agregar_productos">

        <div class="col-md-3">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
        </div>

        <div class="col-md-3">
            <select name="categoria_id" class="form-select" required>
                <option value="">Selecciona categoría</option>
                <?php
                $catQuery = "SELECT categoria_id, nombre FROM categorias ORDER BY nombre";
                $catResult = mysqli_query($conection, $catQuery);
                while ($cat = mysqli_fetch_assoc($catResult)) {
                    echo '<option value="' . htmlspecialchars($cat['categoria_id']) . '">' . htmlspecialchars($cat['nombre']) . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="col-md-2">
            <input type="number" step="0.01" name="precio" class="form-control" placeholder="Precio" required>
        </div>

        <div class="col-md-2">
            <input type="number" name="stock" class="form-control" placeholder="Stock" required>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-success w-100">Añadir</button>
        </div>
    </form>

    <div class="mt-4">
        <a href="index.php" class="btn btn-secondary">🔙 Volver</a>
    </div>
</div>
</body>
</html>

