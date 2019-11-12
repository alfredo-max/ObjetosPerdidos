
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a href="../HomeUsuarioAdmin.php" class="nav-link">Inicio</a>
            </li>
        </ul>
        <?php
          session_start();
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
</body>
</html>

<?php
 require_once("../../Controllers/Controladores/ObjetoControlador.php");
 require(__DIR__."\..\..\Controllers\Controladores\TramiteContralador.php");
 //echo TramiteControlador::BuscarTramite($_GET["nombreUsuario"],$_GET["nombreObjeto"]);
   
  if($_SESSION["obj"]=="sinreportar"){
      // if(TramiteControlador::BuscarTramite($_GET["nombreUsuario"],$_GET["nombreObjeto"])==0){
        echo "cambiar estado ".ObjetoControlador::CambiarEstado($_GET["nombreObjeto"],"2");
        $fecha= date('Y-m-d H:i:s');
         echo "<br> insertar: ".TramiteControlador::setTramite($_GET["nombreUsuario"],$_GET["nombreObjeto"],$fecha);
        $nombreObjeto=$_GET['nombreObjeto'];
        session_start();
         $_SESSION["obj"]="reportado";
         header ("Location:ver_objeto.php?nombre=$nombreObjeto");
    //    }else{
    //        echo("ya esta en tramite");
    //    }
        
      
  }else{// cancelamos el reporte
      echo "cambbiar estado ".ObjetoControlador::CambiarEstado($_GET["nombreObjeto"],"1");
      echo "<br> eliminado: ".TramiteControlador::DeleteTramite($_GET["nombreUsuario"],$_GET["nombreObjeto"]);
      header ("Location:ListaobjetosUR.php");
      
  }
  
   ?>


 


