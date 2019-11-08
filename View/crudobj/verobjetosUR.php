<?php
session_start();
if(!isset($_SESSION["usuario"])){
header("Location:../../index.php");
}
 require("../../Controllers/Controladores/ObjetoControlador.php");
 $filasObjetos=ObjetoControlador::getObjetos();
 
 //echo($filasObjetos["nombre"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Lista de objetos perdidos</h1>
       <table id="tabla" class="table table-dark text-light">
                <thead>
                <tr>
                <th>Usern</th>
                <th>Email</th>
                <th>Nombre</th>
                <th>Tipo Usuario</th>
                <th>Accion</th>
                </thead>

                <tbody>
                <?php 

             foreach($filasObjetos as $objetos){
                        echo("<tr>". 
                        
                        "<td>".$objetos['nombre']."</td>".
                        "<td>".$objetos['foto']."</td>".
                        "<td>".$objetos['contacto']."</td>".
                        "<td>".$objetos['fecha_reporte']."</td>".   
                        "<td><a class='btn btn-primary' href='EditarUser.php?username=$username'>Ver más</a>"."    "."<a class='btn btn-danger' href='../../Controllers/Accions/AccionEliminarUsuario.php?usr=$username'>Reportar</a></td>"."</tr>");                  
                    
                    } 
                ?>
                </tbody>
      </table>
    
</body>
</html>