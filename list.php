<?php require 'conexion.php'; ?>
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
    <tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th><th>Acciones</th></tr>

    <?php
    
            $consulta = mysqli_query(mysql: $conection, query: "SELECT id, nombre, categoria, precio, stock FROM productos");


                while ($registro = mysqli_fetch_array(result: $consulta)) {//esto es lo que tendria que arreglar porque como va separado puede que el while no sea asi
                    if (($accion == 'modificar') && ($id == $registro['id'])) {
                        //fila modificar
                        ?>
                        <tr class="fila-modificable">
                        <form action="#" method="post">
                            <td><input type="text" name="id" value="<?= $registro["id"] ?>"></td>
                            <td><input type="text" name="nombre" value="<?= $registro["nombre"] ?>"></td>
                            <td><input type="text" name="categoria" value="<?= $registro["categoria"] ?>"></td>
                            <td><input type="text" name="precio" value="<?= $registro["precio"] ?>"></td>
                            <td><input type="text" name="stock" value="<?= $registro["stock"] ?>"></td>
                            <td>
                                <a href="update.php'<?= $id={$registro['id']}?>">✏️</a>
                                <a href="delete.php'<?= $id={$registro['id']}?>">🗑️</a>
                            </td>
                        </tr>
                        </form>
                    }
                }  
    </table>  
             
 <a href="index.php">🔙 Volver</a>
</body>
</html>