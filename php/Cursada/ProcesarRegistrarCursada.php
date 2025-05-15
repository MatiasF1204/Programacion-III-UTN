<?php
include '../Conexiones.php';

$id_alumno = $_POST['id_alumno'];
$id_materia = $_POST['id_materia'];
$parcial1 = $_POST['parcial-1'];
$parcial2 = $_POST['parcial-2'];
$recupera1 = $_POST['recupera-1'];
$recupera2 = $_POST['recupera-2'];
$final = $_POST['final'];
$asistencia = $_POST['asistencia'];

$estado = "Sin Estado"; // Por defecto

// Usamos la mejor nota entre parcial y recuperatorio
$nota1 = max($parcial1, $recupera1);
$nota2 = max($parcial2, $recupera2);

// Calcular estado con las mejores notas
if ($nota1 >= 6 && $nota2 >= 6 && $final >= 6 && $asistencia >= 75) {
    $estado = "Aprobado";
} elseif ($nota1 >= 6 && $nota2 >= 6 && $asistencia >= 75) {
    $estado = "Regular";
} elseif ($asistencia < 75) {
    $estado = "Libre";
} else {
    $estado = "Desaprobado";
}


$sql = "INSERT INTO cursada (
            id_materia,
            id_alumno, 
            parcial_1, 
            parcial_2,
            recuperatorio_1, 
            recuperatorio_2,
            final, 
            estado, 
            asistencia) VALUES (
            '$id_materia',
            '$id_alumno', 
            '$parcial1', 
            '$parcial2',
            '$recupera1', 
            '$recupera2',
            '$final', 
            '$estado',
            '$asistencia'
        )";

$resultado = mysqli_query($connection, $sql);

if ($resultado) {
    echo "Cursada registrada correctamente.";
    echo '<br><a href="../../index.html">Volver al inicio</a>';
} else {
    echo "Error al registrar la cursada: " . mysqli_error($connection);
}
?>