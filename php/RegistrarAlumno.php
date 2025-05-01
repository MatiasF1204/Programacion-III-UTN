<?php
// Importamos el archivo que tiene la lógica para conectar a la bd
include './Conexiones.php';

// Tomamos los valores que ingresó el usuario en el formulario y 
// los guardamos en variables
$name = $_POST['nameComplete'];
$dni = $_POST['dni'];
$sex = $_POST['sex'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$ciudad = $_POST['city'];
$correo = $_POST['email'];

// Crear la consulta SQL, usando las variables qu creamos previamente
$sql = "INSERT INTO alumno (nombre_apellido, email, dni, fecha_nacimiento, sexo, ciudad)
VALUES ('$name', '$correo', '$dni', '$fechaNacimiento', '$sex', '$ciudad')";

// Ejecutar la consulta sql
$response = mysqli_query($connection, $sql);
?>

<!-- Código HTML, muestra los datos del alumno agregado, con una confimación y botón para volver a inicio -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultado del Registro</title>
    <!-- Estilos, como no son muchos, se los agrega acá y no en otro fichero .css -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 40px;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #27ae60;
        }

        p {
            margin: 10px 0;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #2980b9;
        }
    </style>
</head>

<body>
    <!-- Contenedor que muestra los datos del alumno agregado -->
    <div class="container">
        <!-- Usamos un condicional para comprobar si la variable response es true (o sea,
        si la consulta para insertar el alumno en la bd fue exitosa) -->
        <?php if ($response): ?>
            <h2>¡Alumno registrado exitosamente!</h2>
            <!-- Se usa htmlspecialchars() para evitar que se ejecute código malicioso 
            si el usuario escribe <script> o HTML en los inputs -->
            <p><strong>Nombre y apellido:</strong> <?= htmlspecialchars($name) ?></p>
            <p><strong>DNI:</strong> <?= htmlspecialchars($dni) ?></p>
            <p><strong>Sexo:</strong> <?= htmlspecialchars($sex) ?></p>
            <p><strong>Fecha de nacimiento:</strong> <?= htmlspecialchars($fechaNacimiento) ?></p>
            <p><strong>Ciudad:</strong> <?= htmlspecialchars($ciudad) ?></p>
            <p><strong>Correo:</strong> <?= htmlspecialchars($correo) ?></p>
            <!-- Ahora si falló la consulta, muestra un mensaje de error -->
        <?php else: ?>
            <p class="error">Error al registrar el alumno</p>
        <!-- En php hay que terminar con el condicional con endif -->
        <?php endif; ?>
        <!-- Botón para volver a inicio -->
        <a class="btn" href="../index.html">Volver al inicio</a>
    </div>
</body>

</html>