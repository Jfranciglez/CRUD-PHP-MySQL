<?php require 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>
    <form action="#" method="post">
        <td><input type="text" name="id" value="<?= $registro["id"] ?>"></td>
        <td><input type="text" name="nombre" value="<?= $registro["nombre"] ?>"></td>
        <td><input type="text" name="categoria" value="<?= $registro["categoria"] ?>"></td>
        <td><input type="text" name="precio" value="<?= $registro["precio"] ?>"></td>
        <td><input type="text" name="stock" value="<?= $registro["stock"] ?>"></td>


        if ($accion == "actualizar") {


                $actualizar = "UPDATE empleado SET dni='$dni', nombre='$nombre', cargo='$cargo', sueldo='$sueldo' WHERE dni='$dniAntiguo'";
                mysqli_query(mysql: $conexion, query: $actualizar);

            } <!--traer consulta tambien alomejor -->
<a href="listar.php">🔙 Volver</a>
</body>

</html>