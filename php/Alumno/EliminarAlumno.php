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
            // Obtengo ID del alumno a eliminar
            $id = $_GET['id'];

            // Selecciono a los alumnos que se encuentren en la tabla cursada
            $validar = "SELECT * FROM cursada 
                    WHERE id_alumno = $id
            ";

            // Ejecuto consulta de validación
            $resultado_validar = mysqli_query($connection, $validar);

            // Obtengo la cantidad de alumnos encontrados
            $cantidad = mysqli_num_rows($resultado_validar);

            // Si la cantidad es mayor a cero, es decir, que SI está ese alumno en la tabla cursada:
            if ($cantidad > 0) {
                echo "No se puede eliminar un alumno que está registrado en una cursada.";
            } else {
                // En caso de que no esté, se lo elimina
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