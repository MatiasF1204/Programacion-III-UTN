<?php
include '../Conexiones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Alumno</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>

<div class="contenedor-mensaje">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM alumno WHERE id = $id";

        if (mysqli_query($connection, $sql)) {
            echo "<div class='mensaje mensaje-exito'>";
            echo "<h2>Alumno eliminado correctamente.</h2>";
            echo "</div>";
        } else {
            echo "<div class='mensaje mensaje-error'>";
            echo "<h2>Error al eliminar el alumno: " . mysqli_error($connection) . "</h2>";
            echo "</div>";
        }
    } else {
        echo "<div class='mensaje mensaje-error'>";
        echo "<h2>ID de alumno no proporcionado.</h2>";
        echo "</div>";
    }
    ?>
    <a class="btn-volver" href="./ListarAlumnos.php">Volver al listado</a>
</div>

</body>
</html>
