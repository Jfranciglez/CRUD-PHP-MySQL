<?php require 'conection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
</head>

<body>
    <h2>Listado de productos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>

        <?php
        $listado = "SELECT id, nombre, categoria, precio, stock FROM productos";
        $consulta = mysqli_query(mysql: $conection, query: $listado);


        while ($registro = mysqli_fetch_array(result: $consulta)) {// muestra las variables que obtenga de las consultas
            ?>
            <tr>
                <td><?= $registro['id'] ?></td>
                <td><?= $registro['nombre'] ?></td>
                <td><?= $registro['categoria'] ?></td>
                <td>€<?= $registro['precio'] ?></td>
                <td><?= $registro['stock'] ?></td>
                <td>
                    <form action="delete.php" method="post">
                        <input type="hidden" name="accion" value="eliminar">
                        <input type="hidden" name="id" value="<?= $registro["id"] ?>">
                        <button type="submit" class="btn btn-danger" <?= $accion == "modificar" ? "disabled" : "" ?>>
                            <i class="bi bi-trash"></i>
                            Eliminar
                        </button>
                    </form>
                </td>
                <td>
                    <form action="update.php" method="post">
                        <input type="hidden" name="accion" value="modificar">
                        <input type="hidden" name="id" value="<?= $registro["id"] ?>">
                        <button type="submit" class="btn btn-primary" <?= $accion == "modificar" ? "disabled" : "" ?>>
                            <i class="bi bi-pencil"></i>
                            Modificar
                        </button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <a href="index.php">🔙 Volver</a>
</body>

</html>