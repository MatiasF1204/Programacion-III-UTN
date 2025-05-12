<?php
include '../Conexiones.php';

$id = $_GET['id'];
$sql = "SELECT * FROM materias WHERE id = $id";
$resultado = mysqli_query($connection, $sql);
$materia = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agregar Materia</title>
    <link rel="stylesheet" href="../../styles/Formularios.css" />
  </head>
  <body>
    <main>
      <form action="./ActualizarMateria.php" method="post" aria-labelledby="form-title">
        <h1 id="form-title">Agregar Materia</h1>

        <input type="hidden" name="id" value="<?= $materia['id'] ?>">

        <div class="form-group">
          <label for="nombre">Nombre de materia:</label>
          <input type="text" name="nombre" id="nombre" required minlength="2" />
        </div>

        <div class="form-group">
          <label for="año">Año de cursada:</label>
          <input
            type="number"
            name="año"
            id="año"
            required
            maxlength="1"
            min="0"
          />
        </div>

        <div class="form-group">
          <label for="cuatri">Número de Cuatrimestre</label>
          <input
            type="number"
            name="cuatri"
            id="cuatri"
            required
            maxlength="1"
          />
        </div>

        <div class="form-group">
          <label for="correlatividad">¿Cumple con la correlatividad?</label>
          <select name="correlatividad" id="correlatividad">
            <option value="none">-- Ingrese opción --</option>
            <option value="Sí">Sí</option>
            <option value="No">No</option>
          </select>
        </div>

        <button type="submit">Enviar</button>
        <a class="btn-volver" href="../../index.html">Volver</a>
      </form>
    </main>
  </body>
</html>
