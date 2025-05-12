<?php
include '../Conexiones.php';

$listar_materias_sql = "SELECT * FROM materias";
$respuesta = mysqli_query($connection, $listar_materias_sql);
$cantidad_registros = mysqli_num_rows($respuesta);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listar Materias</title>
    <link rel="stylesheet" href="../../styles.css" />
</head>

<body class="pagina-listado">
    <div class="contenedor-listado">
        <h1 class="titulo-listado">Listado de Materias</h1>
        <table class="tabla-alumnos">
            <?php if ($cantidad_registros > 0): ?>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Año</th>
                        <th>Cuatrimestre</th>
                        <th>Correlatividad</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($materia = mysqli_fetch_assoc($respuesta)): ?>
                        <tr>
                            <td><?= $materia['id'] ?></td>
                            <td><?= $materia['nombre'] ?></td>
                            <td><?= $materia['anio'] ?></td>
                            <td><?= $materia['cuatrimestre'] ?></td>
                            <td><?= $materia['correlatividad'] ?></td>
                            <td><a class="btn-modificar" href="./ModificarMateria.php?id=<?= $materia['id'] ?>">Modificar</a></td>
                            <td><a class="btn-eliminar" href="./EliminarMateria.php?id=<?= $materia['id'] ?>">Eliminar</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            <?php else: ?>
                <p style="text-align: center; font-weight: bold;">No hay materias registradas.</p>
            <?php endif; ?>
        </table>

        <div class="volver-inicio">
            <a class="btn-volver" href="../../index.html">Volver al inicio</a>
        </div>
    </div>
</body>

</html>