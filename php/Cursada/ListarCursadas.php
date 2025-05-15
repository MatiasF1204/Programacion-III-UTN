<?php
include '../Conexiones.php';

$sql = "SELECT * FROM cursada";
$repuesta = mysqli_query($connection, $sql);
$cantidad_registros = mysqli_num_rows($repuesta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Cursadas</title>
</head>
<body>
    <table border="1" aria-placeholder="SIN VALOR">
        <?php if ($cantidad_registros > 0): ?>
        <thead>
            <th>ID CURSADA</th>
            <th>ID MATERIA</th>
            <th>ID ALUMNO</th>
            <th>PARCIAL 1</th>
            <th>PARCIAL 2</th>
            <th>RECUPERATORIO 1</th>
            <th>RECUPERATORIO 2</th>
            <th>FINAL</th>
            <th>ESTADO</th>
            <th>ASISTENCIA</th>
        </thead>
        <tbody>
            <?php while ($cursada = mysqli_fetch_assoc($repuesta)): ?>
            <tr>
                <td><?php echo $cursada['id_cursada'] ?></td>
                <td><?php echo $cursada['id_materia'] ?></td>
                <td><?php echo $cursada['id_alumno'] ?></td>
                <td><?php echo $cursada['parcial_1'] ?></td>
                <td><?php echo $cursada['parcial_2'] ?></td>
                <td><?php echo $cursada['recuperatorio_1'] ?></td>
                <td><?php echo $cursada['recuperatorio_2'] ?></td>
                <td><?php echo $cursada['final'] ?></td>
                <td><?php echo $cursada['estado'] ?></td>
                <td><?php echo $cursada['asistencia'] ?></td>
                <td><a href="./EliminarCursada.php?id_cursada=<?= $cursada['id_cursada'] ?>">ELIMINAR</a></td>
                <td><a href="">MODIFICAR</a></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        <?php endif; ?>
        <a href="../../index.html">Volver</a>
    </table>
</body>
</html>