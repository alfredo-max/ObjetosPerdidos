<?php
   require_once ("../../Models/Dao/UsuarioDao.php");
   require_once ("UsuarioControlador.php");
   require_once ("../../Models/Entidad/Usuario.php");
   $email= $_POST["email"];
  
   $fila= UsuarioDao::BuscarGmail($email);
//    echo ($fila);
    if($fila>0){
        // echo("el correo existe y esta registrado");
        
        header ("Location:mensajeGmail.php?email=$email");
        
    }else{
        echo ("el correo no existe en nuestra base de datos");
    }



?>