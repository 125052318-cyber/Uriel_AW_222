<?php
/* En esta parte del codigo realizamos una accion para poder mostrar la informacion de los alumnos */
include("conexion.php");

$con = conectar();

$sql = "SELECT * FROM alumnos";

$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD DE ALUMNOS</title>
</head>
<body>
    <h1>TABLA ALUMNOS</h1>

    <table border = "1">
        <tr>
            <th>MATRICULA</th>
            <th>NOMBRE</th>
            <th>APELLIDO PATERNO</th>
            <th>APELLIDO MATERNO</th>
            <th>ACCIONES</th>
        </tr>
    </table>
</body>
</html>