<?php
include '../Conexiones.php';

$id = $_GET['id'];

$sql = "DELETE FROM materias 
        WHERE id = $id";

$respuesta = mysqli_query($connection, $sql);

if ($respuesta) {
    echo "Materia eliminada exitosamente.";
    echo '<br> <a href="../../index.html">Volver a Inicio</a>';
} else {
    echo "Error al eliminar materia: " . mysqli_error($connection);
}
?>

