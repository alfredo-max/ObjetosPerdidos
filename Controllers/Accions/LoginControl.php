 
<?php // en esta carpeta recibo los datos con el metodo post de login.php
      // aca se validan los datos se mandan a la funcion login de usuario control 
      // y con lo que retorne decido si lo redirijo a la la pagina de admin o usuario regular
    
      require("../Controladores/UsuarioControlador.php");
     $username=htmlentities(addslashes($_POST["username"]));
     $password=htmlentities(addslashes($_POST["clave"]));
    $userFound;
     if(!empty($username) && !empty($password)){
         $userFound= UsuarioControlador::Login($username,$password);
        
        if($userFound==null){
          echo("no registrado");
                  
        }else{
         session_start();          
          $_SESSION["usuario"]=$userFound->getUsername();
          $_SESSION["tipo"]=$userFound->getTipoUsuario();
           switch($userFound->getTipoUsuario()){
             case "usuario_regular":
               header("Location:../../View/HomeUsuarioRegular.php");                 
             break;
             case "usuario_admin":
             header("Location:../../View/HomeUsuarioAdmin.php");             
             break;
          }
       
       }


     }else{
          echo("hay un dato vacio");
     }
     echo ("<a href='../../View/Login.php'>Volver a ingresar</a>");
  ?>