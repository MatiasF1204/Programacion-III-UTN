<?php
include '../Conexiones.php';

// Consulta SQL para obtener todos los alumnos de la tabla
$sql = "SELECT * FROM alumno";

// Ejecutamos la consulta
$resultado_consulta = mysqli_query($connection, $sql);

// Obtenemos la cantidad de registros para validar
$cantidad_registros = mysqli_num_rows($resultado_consulta);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listar Alumnos</title>
    <!-- Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="../../styles.css" />
</head>

<body class="pagina-listado">
    <!-- Contenedor principal para centrar y aplicar estilo al contenido -->
    <div class="contenedor-listado">
        <h1 class="titulo-listado">Listado de Alumnos</h1>
        <!-- Tabla con clase para aplicar estilos -->
        <table class="tabla-alumnos">
            <!-- Validamos que la cantidad de registro sea mayor a cero -->
            <?php if ($cantidad_registros > 0): ?>
                <!-- Encabezado de tabla -->
                <thead>
                    <!-- Una sola fila -->
                    <tr>
                        <!-- Con 9 columnas -->
                        <th>ID</th>
                        <th>Nombre y Apellido</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Sexo</th>
                        <th>Ciudad</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Usamos la función mysqli_fetch_assoc() para obtener una fila de resultado_consulta$resultado_consultaados de la consulta SQL  -->
                    <?php while ($row = mysqli_fetch_assoc($resultado_consulta)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nombre_apellido'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['dni'] ?></td>
                            <td><?= $row['fecha_nacimiento'] ?></td>
                            <td><?= $row['sexo'] ?></td>
                            <td><?= $row['ciudad'] ?></td>
                            <!-- Redirije a la página ModificaAlumno.php enviando el id del alumno como parámetro -->
                            <td><a class="btn-modificar" href="./ModificarAlumno.php?id=<?= $row['id'] ?>">Modificar</a></td>
                            <td><a class="btn-eliminar" href="./EliminarAlumno.php?id=<?= $row['id'] ?>">Eliminar</a></td>
                        </tr>
                    <?php endwhile; ?>
                    <!-- En caso de que no haya registros, mostramos lo siguiente -->
                <?php else: ?>
                    <p style="text-align: center; font-weight: bold;">No hay alumnos registrados.</p>
                <?php endif; ?>
                </tbody>
        </table>
        <!-- Botón para volver al menú principal -->
        <div class="volver-inicio">
            <a class="btn-volver" href="../../index.html">Volver al inicio</a>
        </div>
    </div>
</body>

</html>