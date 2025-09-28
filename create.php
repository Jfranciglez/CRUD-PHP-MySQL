<?php require 'conection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>

<body>
    <table>

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <tr>
            <form action="#" method="post">
                <td><input type="number" name="id" required></td>
                <td><input type="text" name="nombre" required></td>
                <td><input type="text" name="categoria" required></td>
                <td><input type="number" name="precio" required></td>
                <td><input type="number" name="stock" required></td>
                <td>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus"></i>
                        Añadir
                    </button>
                </td>
            </form>
        </tr>
    </table>
    <?php
    if (isset($_POST["id"])) { //puede que tenga que cambiarlo por el otro ?? "";
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $categoria = $_POST["categoria"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];


    }

    $insercion = "INSERT INTO productos VALUES ('$id', '$nombre', '$categoria', '$precio', '$stock')";
    mysqli_query(mysql: $conection, query: $insercion);


    $consulta = mysqli_query(mysql: $conection, query: "SELECT id, nombre, categoria, precio, stock FROM productos");
    ?>


    <a href="index.php">🔙 Volver</a>

</body>

</html>