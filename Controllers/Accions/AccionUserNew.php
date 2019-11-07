<?php

require_once(__DIR__."/../Controladores/UsuarioControlador.php");

$username=$_POST["username"];
$clave=$_POST["clave"];
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$tipo_usuario=$_POST["tipo_usuario"];

if( !empty($username) && !empty($clave) && !empty($nombre) && !empty($correo) && !empty($tipo_usuario)){

    $userInsertado=UsuarioControlador::InsertarUsuario($username,$clave,$nombre,$correo,$tipo_usuario);
   // si se inserto correctamente
   if($userInsertado==true){
       session_start();
       $_SESSION["usuario"]=$username;
        header("Location:../../View/crud/crud.php");
    }else{
       echo("el usuario  ya hiciste");
       echo "<a href='../../View/Signup.php'>volver a registrar</a>";
    }
}

?>