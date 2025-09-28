<?php require 'conexion.php'; ?>
<?php
$id = $_POST['id'];
$conexion->query("DELETE FROM productos WHERE id=$id");
echo "🗑️ Producto eliminado.";
?>
<a href="listar.php">🔙 Volver</a>