<?php
include '../Conexiones.php';

$id = $_GET['id'];

$sql_validar = "SELECT * FROM cursada
                WHERE id_materia = $id";

$resultado_validar = mysqli_query($connection, $sql_validar);

$cantidad = mysqli_num_rows($resultado_validar);

if ($cantidad > 0) {
    echo "No se puede eliminar una materia que está asociada a una cursada.";
} else {
    $sql = "DELETE FROM materias 
        WHERE id = $id";

    $respuesta = mysqli_query($connection, $sql);

    if ($respuesta) {
        echo "Materia eliminada exitosamente.";
        echo '<br> <a href="../../index.html">Volver a Inicio</a>';
    } else {
        echo "Error al eliminar materia: " . mysqli_error($connection);
    }
}
