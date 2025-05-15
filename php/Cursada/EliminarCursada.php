<?php
include '../Conexiones.php';

$id = $_GET['id_cursada'];

$sql = "DELETE FROM cursada
        WHERE $id = id_cursada";

$respuesta = mysqli_query($connection, $sql);

if ($respuesta){
    echo "Cursada eliminada.";
    echo '<br><a href="../../index.html">Volver</a>';
}
?>
