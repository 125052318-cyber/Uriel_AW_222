<?php
/* Conectar con la base de datos */
include("conexion.php");
$con = conectar();

/* Recibir la informacion del formulario */
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$edad = $_POST['edad'];

/* Consulta para insertar datos */
$sql = "INSERT INTO alumnos (matricula,nombre,apellido_p,apellido_m,edad)
VALUES
('$matricula','$nombre','$apellido_p','$apellido_m','$edad') ";

/* Ejecutamos la consulta */
$query = mysqli_query($con,$sql);

/*  */
if($query){
    header("Location: alumnos.php");
}
else{
    echo"ERROR AL INSERTAR AL ALUMNOS";
}

?>