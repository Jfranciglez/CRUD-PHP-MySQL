<?php require 'conection.php'; ?>
<?php require 'variables.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Almacén</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4 text-center">🗃️ Panel de Almacén</h1>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">📦 Productos</h5>
                        <p class="card-text">Gestiona los productos del almacén.</p>
                        <a href="list.php" class="btn btn-primary">Ir a Productos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-secondary">
                    <div class="card-body">
                        <h5 class="card-title">🏷️ Categorías</h5>
                        <p class="card-text">Administra las categorías disponibles.</p>
                        <a href="categorias.php" class="btn btn-secondary">Ir a Categorías</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5">
            <small>Desarrollado por Jennifer González</small>
        </footer>
    </div>
</body>
</html>
