<?php
// aca validamos los datos(aun no lo he hecho) para luego mandarlo al controlador
require_once(__DIR__."/../Controladores/UsuarioControlador.php");
session_start();
if(!isset($_SESSION["usuarioEditar"])){
 header("Location:../../index.html");
}

// usuario original
$userRealObject= UsuarioControlador::getUsuario($_SESSION["usuarioEditar"]);


$user=$_POST["username"];
$nombre=$_POST["nombre"];
$email=$_POST["email"];
$pass=$_POST["clave"];
$tipo_usuario=$_POST["tipo_usuario"];

$band=UsuarioControlador::EditarUsuario($userRealObject,$user,$nombre,$pass,$email,$tipo_usuario);
 
if($band==true){
   // header("Location:../../View/crud/crud.php");
   echo $band;
}else{
    echo("no se actualizo");
}


?>

