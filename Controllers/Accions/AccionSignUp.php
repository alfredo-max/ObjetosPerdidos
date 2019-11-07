<?php
//validamos los datos y se los mandamos a usuariocontrolador

require_once (__DIR__."/../Controladores/UsuarioControlador.php");

$username=$_POST["username"];
$clave=$_POST["clave"];
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];


 if( !empty($username) && !empty($clave) && !empty($nombre) && !empty($correo)){
       
     $userInsertado=UsuarioControlador::InsertarUsuario($username,$clave,$nombre,$correo,"usuario_regular");
    
    //si se inserto correctamente
    if($userInsertado==true){
        session_start();
        $_SESSION["usuario"]=$username;
         header("Location:../../View/HomeUsuarioRegular.php");
     }else{
        echo("el usuario  ya hiciste");
        echo "<a href='../../View/Signup.php'>volver a registrar</a>";
     }
}

?>