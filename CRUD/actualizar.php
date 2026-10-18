<?php
/* Conectamos a la base de datos */
include("conexion.php");
$con = conectar();

/* Recibimos el ID (matrícula) desde el botón de alumnos.php */
$id = $_GET['id'];

/* Buscamos solo a ese alumno en específico */
$sql = "SELECT * FROM alumnos WHERE matricula = '$id'";
$query = mysqli_query($con, $sql);

/* Guardamos los datos en la variable $row */
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Alumno</title>
</head>
<body>
    <div>
        <h1>ACTUALIZAR DATOS DEL ALUMNO</h1>
        
        <!-- Al darle clic a Guardar, enviaremos los datos a editar.php -->
        <form action="editar.php" method="POST">
            <div style="display: flex; gap: 10px; flex-direction: column; max-width: 300px;">

                <!-- La matrícula es de solo lectura (readonly) para no romper la base de datos -->
                <label>Matrícula</label>
                <input type="text" class="form-control" name="matricula" value="<?php echo $row['matricula'] ?>" readonly>

                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'] ?>">

                <label>Apellido Paterno</label>
                <input type="text" class="form-control" name="apellido_p" value="<?php echo $row['apellido_p'] ?>">

                <label>Apellido Materno</label>
                <input type="text" class="form-control" name="apellido_m" value="<?php echo $row['apellido_m'] ?>">

                <label>Edad</label>
                <input type="text" class="form-control" name="edad" value="<?php echo $row['edad'] ?>">

                <button type="submit"> GUARDAR CAMBIOS </button>
                
                <br>
                <a href="alumnos.php">Cancelar y volver atrás</a>
            </div>
        </form>
    </div>
</body>
</html>