<?php
include("conexionE.php");

$con = conectar();

$sql = "SELECT * FROM elementos";

$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXAMEN</title>


    <style>
        div{
            padding: 20px 20px;
        }

        .no1{
             background-color:blue; 
          padding: 20px 20px;  
          margin: 20px;
          border: 20px  #000;
        }

                .no2{
          background-color:purple; 
          padding: 50px 50px;  
          margin: 20px;
          border: 20px  #000;
        }

        .conte{
            gap: 30px;
            display: grid;
            grid-template-columns: repeat(1, 1fr);
        }

    </style>
</head>
<body>
            <div class="no1"> 
                <center><h1>EXAMEN 1ER PARCIAL - APLICACIONES WEB </h1></center>
            </div>

            <table>
            <tr>
                <td>
                    <div class="no2">
                        <h1>FORMULARIO</h1>
                        <form action="insertarE.php" method="POST">
                        <div>
                            <table>

                           <tr>
                            <td>
                                <input type = "text"
                            class = "form-control"
                            name = "id"
                            placeholder = "ID">
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <input type = "text"
                            class = "form-control"
                            name = "nombre"
                            placeholder = "NOMBRE">
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <input type = "text"
                            class = "form-control"
                            name = "marca"
                            placeholder = "MARCA">
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <input type = "text"
                            class = "form-control"
                            name = "stock"
                            placeholder = "STOCK">
                            </td>
                            </tr>

                            <tr>
                            <td>
                                <input type = "text"
                            class = "form-control"
                            name = "precio"
                            placeholder = "PRECIO">
                            </td>
                            </tr>

                            <tr><td> <button type="submit"> GUARDAR </button> </td></tr>

                            </table>
                        </div>
                    </div>   
                </td>

                <td>
                    <div class="no2">
                        <center><h1> TABLA DE PRODUCTOS</h1></center>
                        <table border = "2">

                        <thead>
                        <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>MARCA</th>
                        <th>STOCK</th>
                        <th>PRECIO</th>
                        </tr>
                        </thead> 

                        <tbody>
                        <?php
                        while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                        <td> <?php echo $row['id'] ?></td>
                        <td> <?php echo $row['nombre'] ?></td>
                        <td> <?php echo $row['marca'] ?></td>
                         <td> <?php echo $row['stock'] ?></td>
                        <td> <?php echo $row['precio'] ?></td>
                            </tr>
                        <?php
                         }
                         ?>
        </tbody>
        
                        </table>
                    </div> 
                </td>

            </tr> 
            </table> 
            
            <center>
            <table>
                <tr>
                    <th>
                        <center>
                            <div>
                            <h3>R1- INTRODUCCION A GIT Y GITHUB</h3>
                            <a href="documentos/R1-Uriel Manzano.pdf">R1- INTRODUCCION A GIT Y GITHUB</a>
                            </div>
                        <center>
                    </th>
                    <th>
                        <center>
                            <div>
                            <h3>R2- HTML + CSS + BOX MODEL</h3>
                            <a href="r3 - HTML + CSS + Box Model.pdf">R2- HTML + CSS + BOX MODEL</a>
                            </div>
                        <center>
                    </th>
                    <th>
                        <center>
                        <div>
                            <h3>R3 - FLEX Y GRID</h3>
                            <a href="documentos/R3 Grid y Flex.pdf">R3 - FLEX Y GRID </a>
                            </div>    
                        <center>
                    </th>
                </tr>
            </table>
            </center>

            
              

</body>
</html>