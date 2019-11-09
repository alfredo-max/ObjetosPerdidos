<?php

session_start();
if(!isset($_SESSION["usuario"])){
header("Location:../../index.php");
}
 require("../../Controllers/Controladores/ObjetoControlador.php");
 $objeto=ObjetoControlador::getObjeto($_GET["nombre"]);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver Objeto</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/cssAlf.css">
</head>
<body>
    <!-- <h1>Objeto</h1> -->
     <form action="#">
      <div>
      <label >Nombre</label>
      <input type="text"  value="<?php echo $objeto->getNombre()?>" readonly="readonly">
      </div>
      <label >Descripcion</label>
      <div>
      <textarea name="text_area"  cols="30" rows="10" readonly="readonly"><?php echo $objeto->getDescripcion()?></textarea>
      </div>
      <div>
      <label >Estado</label>
      <input type="text"  value="<?php echo $objeto->getEstado()?>" readonly="readonly">
      </div>
      <div>
      <label >Foto</label>
      <img  src="data:image/jpg;base64,<?php echo base64_encode($objeto->getFoto());?>" alt="hola">
      </div>
      <div>
      <label >Contacto</label>
      <input type="text"  value="<?php echo $objeto->getContacto()?>" readonly="readonly">
      </div>
      <div>
      <label >Fecha de Reporte</label>
      <input type="text"  value="<?php echo $objeto->getFechaReporte()?>" readonly="readonly">
      </div>
     </form>
</body>
</html>