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

    <table border = "2">

    <thead>
        <tr>
            <th>MATRICULA</th>
            <th>NOMBRE</th>
            <th>APELLIDO PATERNO</th>
            <th>APELLIDO MATERNO</th>
            <th>EDAD</th>
            <th>ACCIONES</th>
        </tr>
        </thead> 
        
        <tbody>
            <?php
            while($row=mysqli_fetch_array($query)){
            ?>
            <tr>
            <td> <?php echo $row['matricula'] ?></td>
            <td> <?php echo $row['nombre'] ?></td>
            <td> <?php echo $row['apellido_p'] ?></td>
            <td> <?php echo $row['apellido_m'] ?></td>
            <td> <?php echo $row['edad'] ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

        <div>
            <h1>FORMULARIO</h1>
          <form action="insertar.php" method="POST">
            <div style="display: flex; gap: 10px">

                <input type = "text"
                class = "form-control"
                name = "matricula"
                placeholder = "Matricula">

                <input type = "text"
                class = "form-control"
                name = "nombre"
                placeholder = "Nombre">

                <input type = "text"
                class = "form-control"
                name = "apellido_p"
                placeholder = "Apellido Paterno">

                <input type = "text"
                class = "form-control"
                name = "apellido_m"
                placeholder = "Apellido Materno">

                <input type = "text"
                class = "form-control"
                name = "edad"
                placeholder = "Edad">

                <button type="submit"> GUARDAR </button>
                
            </div>

          </form>
        </div>
        
    
</body>
</html>