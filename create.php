<?php require 'conection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>create</title>
</head>

<body>
    <div id="principal">
        <div class="card">
            <table class="table  table-success table-striped">

                <tr>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
                <tr>
                    <form action="#" method="post">
                        <td><input type="text" name="nombre" required></td>
                        <td><input type="text" name="categoria" required></td>
                        <td><input type="number" step="0.01" name="precio" required></td>
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


            $insercion = "INSERT INTO productos VALUES ('$nombre', '$categoria', '$precio', '$stock')";
            mysqli_query(mysql: $conection, query: $insercion);


           
            ?>


            <a href="index.php">🔙 Volver</a>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
                crossorigin="anonymous"></script>
        </div>
    </div>
</body>

</html>