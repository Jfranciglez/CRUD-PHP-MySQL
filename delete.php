<?php require 'conection.php'; ?>
<?php
if ($accion == "eliminar") {

$eliminar = "DELETE FROM productos WHERE id=$id";
mysqli_query(mysql: $conection, query: $eliminar);

}
?>
<a href="list.php">🔙 Volver</a>