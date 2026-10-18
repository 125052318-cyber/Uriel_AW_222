<?php
include("conexionE.php");
$con = conectar();

$matricula = $_GET['id'];

$sql = "DELETE FROM elementos WHERE id = '$id'";
$query = mysqli_query($con,$sql);

if($query){
    header("Location: alumnos.php");
} else{
    echo"Error al eliminar el producto: " . mysqli_error($con);
}
?>
