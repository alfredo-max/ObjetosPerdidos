


<?php
 require_once("../../Controllers/Controladores/ObjetoControlador.php");
 require(__DIR__."\..\..\Controllers\Controladores\TramiteContralador.php");
   session_start();
  if($_SESSION["obj"]=="sinreportar"){
       
        echo "cambbiar estado ".ObjetoControlador::CambiarEstado($_GET["nombreObjeto"],"2");
        $fecha= date('Y-m-d H:i:s');
         echo "<br> insertar: ".TramiteControlador::setTramite($_GET["nombreUsuario"],$_GET["nombreObjeto"],$fecha);
        $nombreObjeto=$_GET['nombreObjeto'];
        session_start();
         $_SESSION["obj"]="reportado";
         header ("Location:ver_objeto.php?nombre=$nombreObjeto");
      
  }else{// cancelamos el reporte
      echo "cambbiar estado ".ObjetoControlador::CambiarEstado($_GET["nombreObjeto"],"1");
      echo "<br> eliminado: ".TramiteControlador::DeleteTramite($_GET["nombreUsuario"],$_GET["nombreObjeto"]);
  }
  
   


 

?>
