<?php
include("conexion.php");
$con = conectar();

/* Recibimos la informacion del formulario de actualizar.php */
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellido_p = $_POST['apellido_p'];
$apellido_m = $_POST['apellido_m'];
$edad = $_POST['edad'];

/* Consulta SQL para ACTUALIZAR los datos. 
   Fíjate que usamos UPDATE en lugar de INSERT, y le decimos WHERE matricula = '$matricula' 
   para que solo modifique a ese alumno y no a todos */
$sql = "UPDATE alumnos SET 
        nombre = '$nombre', 
        apellido_p = '$apellido_p', 
        apellido_m = '$apellido_m', 
        edad = '$edad' 
        WHERE matricula = '$matricula'";

/* Ejecutamos la consulta */
$query = mysqli_query($con, $sql);

/* Si la consulta fue exitosa, regresamos a la tabla de alumnos */
if($query){
    header("Location: alumnos.php");
} else {
    echo "Error al actualizar los datos: " . mysqli_error($con);
}
?>