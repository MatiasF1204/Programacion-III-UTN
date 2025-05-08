<?php
include './Conexiones.php';

// Recibimos los datos del formulario
$id = $_POST['id'];
$nombre_completo = $_POST['nameComplete'];
$dni = $_POST['dni'];
$sexo = $_POST['sex'];
$fecha_nacimiento = $_POST['fechaNacimiento'];
$ciudad = $_POST['city'];
$correo = $_POST['email'];

// Creamos la consulta de actualización
$sql = "UPDATE alumno 
        SET nombre_apellido = '$nombre_completo',
            email = '$correo',
            dni = '$dni',
            sexo = '$sexo',
            fecha_nacimiento = '$fecha_nacimiento',
            ciudad = '$ciudad'
        WHERE id = '$id'";

// Ejecutamos la consulta
if (mysqli_query($connection, $sql)) {
    // Si la consulta devuelve true:
    echo "Alumno actualizado correctamente.";
    echo "<br><a href='./ListarAlumnos.php'>Volver al listado</a>";

} else {
    echo "Error al actualizar el alumno: " . mysqli_error($connection);
}
