<?php require 'conection.php'; ?>
<?php require 'variables.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
</head>

<body>
    <?php
    if ($accion === "agregar_productos") {
        $insercion = "INSERT INTO productos (nombre, categoria_id, precio, stock)
                      VALUES ('$nombre', '$categoria_id', '$precio', '$stock')";
        mysqli_query($conection, $insercion);
    }

    if ($accion === "agregar_categorias") {
        $insercion_cat = "INSERT INTO categorias (nombre)
                          VALUES ('$nombre_cat')";
        mysqli_query($conection, $insercion_cat);
    }
    ?>

    <h2>Listado de productos</h2>
    <table class="table table-success table-striped">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th colspan="2">Acciones</th>
        </tr>
        <!--Para editar los productos-->
        <?php 
        $listado = "SELECT p.id, p.nombre, c.nombre AS categorias, p.precio, p.stock
                    FROM productos p
                    LEFT JOIN categorias c ON p.categoria_id = c.categoria_id";
        $consulta = mysqli_query($conection, $listado);

        while ($registro = mysqli_fetch_array($consulta)) {
        ?>
            <tr>
                <td><?= $registro['id'] ?></td>
                <td><?= $registro['nombre'] ?></td>
                <td><?= $registro['categorias'] ?></td>
                <td>€<?= number_format($registro['precio'], 2) ?></td>
                <td><?= $registro['stock'] ?></td>
                <td>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" name="id" value="<?= $registro["id"] ?>">
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Eliminar
                        </button>
                    </form>
                </td>
                <td>
                    <form action="update.php" method="post">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="hidden" name="id" value="<?= $registro["id"] ?>">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-pencil"></i> Modificar
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>

        <!-- Fila para añadir nuevo producto -->
        <tr>
            <form action="#" method="post">
                <input type="hidden" name="accion" value="agregar_productos">
                <td></td>
                <td><input type="text" name="nombre" required></td>
                <td>
                    <select name="categoria_id" class="form-select" required>
                        <option value="">Selecciona</option>
                        <?php
                        $categorias = mysqli_query($conection, "SELECT categoria_id, nombre FROM categorias");
                        while ($cat = mysqli_fetch_array($categorias)) { ?>
                            <option value="<?= $cat['categoria_id'] ?>"><?= $cat['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><input type="number" step="0.01" name="precio" class="form-control form-control-sm" required></td>
                <td><input type="number" name="stock" class="form-control form-control-sm" required></td>
                <td colspan="2">
                    <button type="submit" class="btn btn-success btn-sm w-100">
                        <i class="bi bi-plus"></i> Añadir
                    </button>
                </td>
            </form>
        </tr>
    </table>

    <hr class="my-5">
    <!--Para editar las categorias-->
    <h2>Categorías</h2>
    <table class="table table-dark table-bordered table-hover align-middle">
        <thead class="table-light text-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $categorias = mysqli_query($conection, "SELECT categoria_id, nombre FROM categorias ORDER BY categoria_id DESC");
            while ($cat = mysqli_fetch_array($categorias)) { ?>
                <tr>
                    <td><?= $cat['categoria_id'] ?></td>
                    <td><?= $cat['nombre'] ?></td>
                    <td>
                        <form action="categorias_delete.php" method="post">
                            <input type="hidden" name="accion" value="eliminar_categorias">
                            <input type="hidden" name="id" value="<?= $cat['categoria_id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>

            <!-- Fila para añadir nueva categoría -->
            <tr>
                <form action="#" method="post">
                    <input type="hidden" name="accion" value="agregar_categorias">
                    <td>
                        <input type="text" name="nombre_categoria" class="form-control form-control-sm" required>
                    </td>
                    <td colspan="2">
                        <button type="submit" class="btn btn-success btn-sm w-100">
                            <i class="bi bi-plus"></i> Añadir
                        </button>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>

    <div class="text-center mt-4">
        <a href="index.php" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Volver
        </a>
    </div>
</body>

</html>
