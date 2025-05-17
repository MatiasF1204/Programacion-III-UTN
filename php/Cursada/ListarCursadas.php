<?php
include '../Conexiones.php';

$sql = "SELECT 
    cursada.id_cursada AS 'id_cursada', 
    cursada.parcial_1 AS 'parcial_1',
    cursada.parcial_2 AS 'parcial_2',
    cursada.recuperatorio_1 AS 'recuperatorio_1',
    cursada.recuperatorio_2 AS 'recuperatorio_2',
    cursada.final AS 'final',
    cursada.estado AS 'estado',
    cursada.asistencia AS 'asistencia',
    alumno.nombre_apellido AS 'alumno',
    materias.nombre AS 'materia'
FROM cursada
INNER JOIN materias ON cursada.id_materia = materias.id
INNER JOIN alumno ON cursada.id_alumno = alumno.id";

$respuesta = mysqli_query($connection, $sql);
$cantidad_registros = mysqli_num_rows($respuesta);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Cursadas</title>
</head>

<body>
    <h1>Listado de Cursadas</h1>

    <?php if ($cantidad_registros > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID CURSADA</th>
                    <th>MATERIA</th>
                    <th>ALUMNO</th>
                    <th>PARCIAL 1</th>
                    <th>PARCIAL 2</th>
                    <th>RECUPERATORIO 1</th>
                    <th>RECUPERATORIO 2</th>
                    <th>FINAL</th>
                    <th>ESTADO</th>
                    <th>ASISTENCIA</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($cursada = mysqli_fetch_assoc($respuesta)): ?>
                    <tr>
                        <td><?= $cursada['id_cursada'] ?></td>
                        <td><?= $cursada['materia'] ?></td>
                        <td><?= $cursada['alumno'] ?></td>
                        <td><?= $cursada['parcial_1'] ?></td>
                        <td><?= $cursada['parcial_2'] ?></td>
                        <td><?= $cursada['recuperatorio_1'] ?></td>
                        <td><?= $cursada['recuperatorio_2'] ?></td>
                        <td><?= $cursada['final'] ?></td>
                        <td><?= $cursada['estado'] ?></td>
                        <td><?= $cursada['asistencia'] ?></td>
                        <td>
                            <a href="./EliminarCursada.php?id_cursada=<?= $cursada['id_cursada'] ?>">ELIMINAR</a> |
                            <a href="#">MODIFICAR</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay cursadas registradas.</p>
    <?php endif; ?>

    <br><a href="../../index.html">Volver</a>
</body>

</html>