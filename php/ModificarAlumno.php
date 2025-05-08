<?php
include './Conexiones.php';

// Verificamos que el ID no sea nulo con isset, y obtenemos el id con GET
if (isset($_GET['id'])) {
    // Guardamos el id en la variable id
    $id = $_GET['id'];

    // Traer los datos del alumno
    $sql = "SELECT * FROM alumno WHERE id = $id";

    // Ejecutamos consulta
    $resultado_consulta = mysqli_query($connection, $sql);

    // Guardamos los datos de alumno en la variable alumno
    $alumno = mysqli_fetch_assoc($resultado_consulta);

    // Mostramos los datos del alumno obtenido
} else {
    echo "ID de alumno no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modificar Alumno</title>
    <link rel="stylesheet" href="../styles/RegistrarAlumno.css" />
</head>

<body>
    <main>
        <form
            action="./ActualizarAlumno.php"
            method="post"
            aria-labelledby="form-title">
            <h1 id="form-title">Modificar Alumno:</h1>

            <!-- Mostrar todos los datos del alumno -->
            <div class="alumno-info" style="border: 2px solid black; border-radius: 10px; padding: 0px 15px;">
                <p><strong>ID:</strong> <?= $alumno['id'] ?></p>
                <p><strong>Nombre:</strong> <?= $alumno['nombre_apellido'] ?></p>
                <p><strong>DNI:</strong> <?= $alumno['dni'] ?></p>
                <p><strong>Email:</strong> <?= $alumno['email'] ?></p>
                <p><strong>Sexo:</strong> <?= $alumno['sexo'] ?></p>
                <p><strong>Fecha de nacimiento:</strong> <?= $alumno['fecha_nacimiento'] ?></p>
                <p><strong>Ciudad de nacimiento:</strong> <?= $alumno['ciudad'] ?></p>
            </div>

            <!-- IMPORTANTE! Agregar línea para mandar el id, ya que no se puede pedir en el 
            formulario porque es un dato que no se modifica -->
            <input type="hidden" name="id" value="<?= $alumno['id'] ?>">

            <div class="form-group">
                <label for="nameComplete">Nombre completo:</label>
                <input type="text" name="nameComplete" id="nameComplete" required />
            </div>

            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="number" name="dni" id="dni" min="0" required />
            </div>

            <div class="form-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" name="email" id="email" required />
            </div>

            <div class="form-group">
                <label for="sex">Sexo:</label>
                <select name="sex" id="sex" required>
                    <option value="" disabled selected>-- Seleccione sexo --</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="fechaNacimiento">Fecha de nacimiento:</label>
                <input
                    type="date"
                    name="fechaNacimiento"
                    id="fechaNacimiento"
                    required />
            </div>

            <div class="form-group">
                <label for="city">Ciudad de nacimiento:</label>
                <select name="city" id="city" required>
                    <option value="" disabled selected>-- Seleccione ciudad --</option>
                    <option value="Río Grande">Río Grande</option>
                    <option value="Tolhuin">Tolhuin</option>
                    <option value="Ushuaia">Ushuaia</option>
                </select>
            </div>

            <button type="submit">Enviar</button>
            <a class="btn-volver" href="./ListarAlumnos.php">Volver</a>
        </form>
    </main>
</body>

</html>