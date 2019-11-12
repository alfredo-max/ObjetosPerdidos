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
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">


</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a href="../HomeUsuarioAdmin.php" class="nav-link">Inicio</a>
            </li>
        </ul>
        <?php

            echo '
                <ul class="nav navbar-nav ml-auto">
                    <li>
                        <a href="../../Controllers/Accions/AccionVerPerfil.php" class="nav-link active">';echo $_SESSION["usuario"];echo '</a>
                    </li>
                    <li>
                        <a href="../../Controllers/Accions/AccionLogOut.php" class="nav-link">Cerrar sesión</a>
                    </li>
                </ul>
                ';
            ?>
   </nav>
    <h1 class="text-light">Lista de objetos perdidos</h1>
       <table id="tabla" class="table table-dark text-light table-striped fondolistaobjetos">
                <thead>
                <tr>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Estado</th>
                <th>Contacto</th>
                <th>Fecha Reporte</th>
                <th>Accions</th>
                </thead>

                <tbody>
                <?php
                     foreach($filasObjetos as $objetos){
                         switch($objetos['estado']){
                            case 1:
                                 $estado="perdido";
                            break;
                            case 2:
                                  $estado="tramite";
                            break;
                            case 3:
                                 $estado="entregado";                             
                            break;
                         } 
                     ?>
                     <tr>
                        <td><?php echo $objetos['nombre']?></td>
                        <td> <img style="width:60px;height:60px;"  src="data:image/jpg;base64,<?php echo base64_encode($objetos['foto']);?>" alt="hola"></td>
                        <td><?php echo $estado?></td> 
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