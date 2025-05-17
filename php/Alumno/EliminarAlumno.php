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

            $validar = "SELECT * FROM cursada 
                    WHERE id_alumno = $id
        ";

            $resultado_validar = mysqli_query($connection, $validar);

            $cantidad = mysqli_num_rows($resultado_validar);

            if ($cantidad > 0) {
                echo "No se puede eliminar un alumno que está registrado en una cursada.";
            } else {
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