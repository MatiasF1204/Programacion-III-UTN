<?php
include './Conexiones.php';

// Consulta SQL para obtener todos los alumnos de la tabla
$sql = "SELECT * FROM alumno";

// Ejecutamos la consulta
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listar Alumnos</title>
    <!-- Enlace al archivo de estilos CSS -->
    <link rel="stylesheet" href="../styles.css" />
</head>

<!-- Clase general para aplicar estilos a toda la página -->

<body class="pagina-listado">
    <!-- Contenedor principal para centrar y aplicar estilo al contenido -->
    <div class="contenedor-listado">
        <h1 class="titulo-listado">Listado de Alumnos</h1>

        <!-- Tabla con clase para aplicar estilos -->
        <table class="tabla-alumnos">
            <thead>
                <tr>
                    <!-- Encabezados de la tabla -->
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

            <tbody>
                <!-- Bucle para recorrer cada alumno obtenido desde la base de datos -->
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <!-- Mostramos los datos de cada alumno en sus respectivas columnas -->
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nombre_apellido'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['dni'] ?></td>
                        <td><?= $row['fecha_nacimiento'] ?></td>
                        <td><?= $row['sexo'] ?></td>
                        <td><?= $row['ciudad'] ?></td>

                        <td>
                            <a class="btn-modificar" href="">Modificar</a>
                        </td>

                        <td>
                            <a class="btn-eliminar" href="">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Botón para volver al menú principal -->
        <div class="volver-inicio">
            <a class="btn-volver" href="../index.html">Volver al inicio</a>
        </div>
    </div>
</body>

</html>