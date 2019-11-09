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
                <th>Nombre</th>
                <th>Foto</th>
                <th>Contacto</th>
                <th>Fecha Reporte</th>
                <th>Accions</th>
                </thead>

                <tbody>
                <?php
                     foreach($filasObjetos as $objetos){
                         
                     ?>
                     <tr>
                        <td><?php echo $objetos['nombre']?></td>
                        <td> <img  src="data:image/jpg;base64,<?php echo base64_encode($objetos['foto']);?>" alt="hola"></td>
                        <td><?php echo $objetos['contacto']?></td>
                        <td><?php echo $objetos['fecha_reporte']?></td>
                        <td><a href='ver_objeto.php?nombre=<?php echo $objetos['nombre']?>'>Ver más</a></td>

                     </tr>
                <?php
                     }
                ?>
                </tbody>
      </table>

</body>
</html>