<?php
include("conexionE.php");
$con = conectar();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$stock = $_POST['stock'];
$precio = $_POST['precio'];

$sql = "INSERT INTO elementos (id,nombre,marca,stock,precio)
VALUES
('$id','$nombre','$marca','$stock','$precio') ";

$query = mysqli_query($con,$sql);


if($query){
    header("Location: examen.php");
}
else{
    echo"ERROR AL INSERTAR LOS PRODUCTOS";
}

?>