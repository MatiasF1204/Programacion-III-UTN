<?php
include '../Conexiones.php';

$id = $_POST['id'];
$nombre_materia = $_POST['nombre'];
$año_cursada = $_POST['año'];
$cuatrimestre = $_POST['cuatri'];
$correlatividad = $_POST['correlatividad'];

$sql = "UPDATE materias
        SET nombre = '$nombre_materia',
            anio = '$año_cursada',
            cuatrimestre = '$cuatrimestre',
            correlatividad = '$correlatividad'
        WHERE id = $id";

$resultado = mysqli_query($connection, $sql);

if ($resultado) {
    echo "Materia actualizada exitosamente";
    echo "<br><a href='./ListarMaterias.php'>Volver al listado</a>";
} else {
    echo "Error al actualizar materia: " . mysqli_error($connection);
}
?>
