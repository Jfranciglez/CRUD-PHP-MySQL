
<?php
require 'conection.php';
require 'variables.php';

if ($accion == "eliminar_categorias" && is_numeric($id)) {
    $eliminar = "DELETE FROM categorias WHERE categoria_id = $id";
    mysqli_query($conection, $eliminar);
}
?>

<a href="list.php">🔙 Volver</a>
