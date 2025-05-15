<?php
include '../Conexiones.php';

$sql_alumno = "SELECT * FROM alumno";
$sql_materia = "SELECT * FROM materias";
$respuesta_alumno = mysqli_query($connection, $sql_alumno);
$respuesta_materia = mysqli_query($connection, $sql_materia);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agregar Cursada</title>
    <link rel="stylesheet" href="../../styles/Formularios.css" />
</head>

<body>
    <main>
        <form
            action="./ProcesarRegistrarCursada.php"
            method="post"
            aria-labelledby="form-title">
            <h1 id="form-title">Agregar Cursada</h1>

            <!-- ID ALUMNO -->
            <div class="form-group">
                <label for="id_alumno">Alumno:</label>
                <select name="id_alumno" id="id_alumno" required>
                    <option value="" disabled selected>-- Ingrese opción --</option>
                    <?php
                    while ($alumno = mysqli_fetch_assoc($respuesta_alumno)) {
                        echo "<option value='{$alumno['id']}'>{$alumno['nombre_apellido']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- ID MATERIA -->
            <div class="form-group">
                <label for="id_materia">Materia:</label>
                <select name="id_materia" id="id_materia" required>
                    <option value="" disabled selected>-- Ingrese opción --</option>
                    <?php
                    while ($materia = mysqli_fetch_assoc($respuesta_materia)) {
                        echo "<option value='{$materia['id']}'>{$materia['nombre']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="parcial-1">Nota de primer parcial:</label>
                <input type="number" name="parcial-1" id="parcial-1" required min="0" max="10" />
            </div>

            <div class="form-group">
                <label for="parcial-2">Nota de segundo parcial:</label>
                <input type="number" name="parcial-2" id="parcial-2" required min="0" max="10" />
            </div>

            <div class="form-group">
                <label for="recupera-1">Nota del primer recuperatorio:</label>
                <input type="number" name="recupera-1" id="recupera-1" required min="0" max="10" />
            </div>

            <div class="form-group">
                <label for="recupera-2">Nota del segundo recuperatorio:</label>
                <input type="number" name="recupera-2" id="recupera-2" required min="0" max="10" />
            </div>

            <div class="form-group">
                <label for="final">Nota del final:</label>
                <input type="number" name="final" id="final" required min="0" max="10" />
            </div>

            <div class="form-group">
                <label for="asistencia">Asistencia (0-100):</label>
                <input type="number" name="asistencia" id="asistencia" required min="0" max="100" />
            </div>

            <button type="submit">Enviar</button>
            <a class="btn-volver" href="../../index.html">Volver</a>
        </form>
    </main>
</body>

</html>