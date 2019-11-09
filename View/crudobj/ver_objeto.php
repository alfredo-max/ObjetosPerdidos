<?php
if(isset($_POST["reportar"])){
  echo "hola";
}
session_start();
if(!isset($_SESSION["usuario"])){
header("Location:../../index.php");
}
 require("../../Controllers/Controladores/ObjetoControlador.php");
 $objeto=ObjetoControlador::getObjeto($_GET["nombre"]);

 $_SESSION["objeto"]=$objeto->getNombre();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver Objeto</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/cssAlf.css">
    <link rel="stylesheet" href="../../sweetalert2/dist/sweetalert2.min.css">
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
<div class="container">

    <div class="row bg-secondary text-white ">
          <div class="col-7 mt-3 ">
          <form  action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              
                <div class="form-group">
                <label >Nombre</label>
                <input type="text"  value="<?php echo $objeto->getNombre()?>" readonly="readonly" class="form-control">
                </div>
                <label >Descripcion</label>
                <div class="form-group">
                <textarea name="text_area"  cols="30" rows="10" readonly="readonly" class="form-control"><?php echo $objeto->getDescripcion()?>    </textarea>
                </div>
                <div class="form-group">
                <label >Estado</label>
                <input type="text"  value="<?php echo $objeto->getEstado()?>" readonly="readonly" class="form-control">
                </div>
                
                <div class="form-group">
                <label >Contacto</label>
                <input type="text"  value="<?php echo $objeto->getContacto()?>" readonly="readonly" class="form-control">
                </div>
                <div class="form-group">
                <label >Fecha de Reporte</label>
                <input type="text"  value="<?php echo $objeto->getFechaReporte()?>" readonly="readonly" class="form-control">
                </div>
        </form>
               
          </div> 
          <div class="col-5 ">
              <div class="row ">
                <div class="form-group col-12 ">
                    <label class="form-control text-center bg-dark text-white mt-5">Foto</label>
                    <img  class="h-80 w-100" src="data:image/jpg;base64,<?php echo base64_encode($objeto->getFoto());?>" alt="hola" class="form-control">
                 </div>
             <div class="form-group col-12 text-center " >
                 <form id="form" action="" >
                      <button type="summit" id="reportar" class="btn btn-success form-control" onclick="Reportar()" > Reportar</button>   
                      <div>&nbsp</div>               
                 </form>
                 
             </div>
              </div>
            

          </div>

    </div>
          
</div>
<script src="../../sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../../js/miJS.js"></script>
</body>
</html>