<?php
include '../Conexiones.php';

$nombre_materia = $_POST['nombre'];
$año_cursada = $_POST['año'];
$cuatrimestre = $_POST['cuatri'];
$correlatividad = $_POST['correlatividad'];

$agregar_materia_sql = "INSERT INTO materias (nombre, anio, cuatrimestre, correlatividad)
                        VALUES ('$nombre_materia', '$año_cursada', '$cuatrimestre', '$correlatividad')
                        ";

$respuesta = mysqli_query($connection, $agregar_materia_sql);

if ($respuesta) {
    echo "Materia agregada correctamente.";
    echo '<br><a href="../../index.html">Volver a Inicio</a>';
} else {
    echo "Error: " . mysqli_error($connection);
}
?>