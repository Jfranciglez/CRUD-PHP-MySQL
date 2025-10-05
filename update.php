<?php require 'conection.php'; ?>
<?php require 'variables.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Producto</title>
  <link rel="stylesheet" href="mazer/assets/compiled/css/app.css">
  <link rel="stylesheet" href="mazer/assets/compiled/css/app-dark.css">
  <link rel="stylesheet" href="mazer/assets/compiled/css/iconly.css">
</head>
<body>
  <div class="container py-4">

    <?php
    if ($accion == "actualizar") {
        $sql = "UPDATE productos SET 
                  nombre = '$nombre', 
                  categoria_id = '$categoria_id', 
                  precio = '$precio', 
                  stock = '$stock'
                WHERE id = '$idAntiguo'";

        mysqli_query($conection, $sql);
        echo "<div class='alert alert-success'>Producto modificado correctamente.</div>";
    }
    ?>

    <h3>Modificar Producto</h3>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th><th>Acción</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $consulta = mysqli_query($conection, "SELECT id, nombre, categoria_id, precio, stock FROM productos");
        while ($registro = mysqli_fetch_array($consulta)) {
            if ($accion == 'modificar' && $id == $registro['id']) {
        ?>
          <tr>
            <form action="#" method="post">
              <td><?= $registro["id"] ?></td>
              <td><input type="text" name="nombre" value="<?= $registro["nombre"] ?>" required></td>
              <td>
                <select name="categoria_id" class="form-select" required>
                  <option value="">Selecciona</option>
                  <?php
                  $cats = mysqli_query($conection, "SELECT categoria_id, nombre FROM categorias");
                  while ($c = mysqli_fetch_array($cats)) {
                    $sel = ($c['categoria_id'] == $registro['categoria_id']) ? "selected" : "";
                    echo "<option value='{$c['categoria_id']}' $sel>{$c['nombre']}</option>";
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
                  <i class="bi bi-check-circle"></i> Guardar
                </button>
              </td>
            </form>
            <td>
              <form action="index.php" method="get">
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

    <a href="index.php" class="btn btn-secondary mt-3">
      <i class="bi bi-arrow-left-circle"></i> Volver
    </a>
  </div>

  <script src="mazer/assets/static/js/initTheme.js"></script>
  <script src="mazer/assets/compiled/js/app.js"></script>
</body>
</html>
