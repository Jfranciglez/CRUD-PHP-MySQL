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
    <title>update</title>
</head>

<body>
    <?php
    
    if ($accion == "actualizar") {


        $actualizar = "UPDATE productos SET id='$id', nombre='$nombre', categoria='$categoria', precio='$precio' WHERE id='$idAntiguo'";
        mysqli_query(mysql: $conection, query: $actualizar);

    } 

    $consulta = mysqli_query(mysql: $conection, query: "SELECT id, nombre, categoria, precio, stock FROM productos");
    while ($registro = mysqli_fetch_array(result: $consulta)) { 
         if (($accion == 'modificar') && ($id == $registro['id'])) {
    ?>

        <tr class="fila-modificable">
            <form action="#" method="post">
                <td><input type="text" name="id" value="<?= $registro["id"] ?>"></td>
                <td><input type="text" name="nombre" value="<?= $registro["nombre"] ?>"></td>
                <td><input type="text" name="categoria" value="<?= $registro["categoria"] ?>"></td>
                <td><input type="text" name="precio" value="<?= $registro["precio"] ?>"></td>
                <td><input type="text" name="stock" value="<?= $registro["stock"] ?>"></td>
                <td>
                    <input type="hidden" name="accion" value="actualizar">
                    <input type="hidden" name="idAntiguo" value="<?= $registro["id"] ?>">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i>
                        Aceptar
                    </button>

                </td>
            </form>
            <td>
                <form action="#" method="post">
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-x-lg"></i>
                        Cancelar
                    </button>
                </form>
            </td>
        </tr>
    <?php
         }
    } ?>

   
    <a href="list.php">🔙 Volver</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>