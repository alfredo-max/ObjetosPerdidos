<?php
session_start();
if(!isset($_SESSION["usuario"])){
header("Location:../../index.php");
}
 require("../../Controllers/Controladores/ObjetoControlador.php");
 $filasObjetos=ObjetoControlador::getObjetos();
 foreach($filasObjetos as $objetos){
      echo $objetos["nombre "];
 }
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
    
    
</body>
</html>