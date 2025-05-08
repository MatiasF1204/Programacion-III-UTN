<?php
// Importamos el archivo que tiene la lógica para conectar a la bd
include '../Conexiones.php';

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
    <!-- Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="../../styles.css" />
</head>

<body class="registro-body">
    <div class="registro-container">
        <!-- Usamos un condicional para comprobar si la variable response es true (o sea,
        si la consulta para insertar el alumno en la bd fue exitosa) -->

        <?php if ($response): ?>
            <h2 class="registro-exito">¡Alumno registrado exitosamente!</h2>
            <p class="registro-dato"><strong>Nombre y apellido:</strong> <?= $name ?></p>
            <p class="registro-dato"><strong>DNI:</strong> <?= $dni ?></p>
            <p class="registro-dato"><strong>Sexo:</strong> <?= $sex ?></p>
            <p class="registro-dato"><strong>Fecha de nacimiento:</strong> <?= $fechaNacimiento ?></p>
            <p class="registro-dato"><strong>Ciudad:</strong> <?= $ciudad ?></p>
            <p class="registro-dato"><strong>Correo:</strong> <?= $correo ?></p>
            <!-- Ahora si falló la consulta, muestra un mensaje de error -->

        <?php else: ?>
            <p class="registro-error">Error al registrar el alumno</p>
            <!-- En php hay que terminar con el condicional con endif -->
        <?php endif; ?>

        <a class="registro-btn-volver" href="../../index.html">Volver al inicio</a>
    </div>
</body>

</html>