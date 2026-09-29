<?php
/* En esta parte del codigo nos ayuda a la conexión de la base de datos que creemos en phpMyadmin */
function conectar(){
    $host = "localhost";
    $user = "root";
    $pass = "";

    /*Es para la base de datos */
    $db = "aw_crud";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$db);

    return $con;
}

?>