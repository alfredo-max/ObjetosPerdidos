<?php
// esta pagina recibe los datos de logincontrol esta contiene todas las funcioneS
// que se realizan en UsuarioDao

require_once (__DIR__."/../../Models/Dao/UsuarioDao.php");


class UsuarioControlador{
  public static function Login($user,$pass){
       $userObject= new Usuario();
       $userObject->setUsername($user);
       $userObject->setClave($pass);
       return UsuarioDao::Login($userObject);
    }
    public static function InsertarUsuario($user,$pass,$clave,$email,$tipoUsuario){
      $userObject= new Usuario();
      $userObject->setUsername($user);
      $userObject->setClave($pass);
      $userObject->setNombre($clave);
      $userObject->setEmail($email);
      $userObject->setTipoUsuario($tipoUsuario);
      return UsuarioDao::InsertarUsuario($userObject);
    }
    public static function getUsuario($user){
      $userObject= new Usuario();
      $userObject->setUserName($user);
      
      $fila= UsuarioDao::getUsuario($userObject);
      $userObject->setId($fila["id_usuario"]);
      $userObject->setClave($fila["clave"]);
      $userObject->setNombre($fila["nombre"]);
      $userObject->setEmail($fila["email"]);
      $userObject->setTipoUsuario($fila["tipo_usuario"]);

      return $userObject;

    }
    public static function getUsuarioEmail($email){
      $userObject= new Usuario();
      $userObject->setEmail($email);
      
      $fila= UsuarioDao::getUsuarioEmail($email);
      $userObject->setUserName($fila["username"]);    
      $userObject->setId($fila["id_usuario"]);
      $userObject->setClave($fila["clave"]);
      $userObject->setNombre($fila["nombre"]);
      $userObject->setTipoUsuario($fila["tipo_usuario"]);

      return $userObject;

    }
    public static function getUsuarios(){
      return UsuarioDao::getUsuarios();
    }

    public static function EditarUsuario($usuario,$user,$name,$pass,$email,$tipoUsuario){
      $consulta="";
      $coma="";
     if($usuario->getUserName()!=$user){
        $consulta= "username ="."'$user'";
        $coma=",";
     }
     if($usuario->getNombre()!=$name){
      $consulta= $consulta.$coma."nombre ="."'$name'";
      $coma=",";
   }
     if($usuario->getClave()!=$pass){
         $consulta= $consulta.$coma."clave ="."'$pass'"; 
         $coma=",";
     }
     if($usuario->getEmail()!=$email){
         $consulta=$consulta.$coma."email ="."'$email'"; 
         $coma=",";
     }
     if($usuario->getTipoUsuario()!=$tipoUsuario){
         $consulta = $consulta.$coma."tipo_usuario ="."'$tipoUsuario'"; 
     }
    
      $consultEnd = UsuarioDao::EditarUsuario($consulta,$usuario->getUserName());
     // return $consult;
       return $consultEnd;
    }

    // cambiar contraseña
    public static function CambiarClave($user,$nueva_clave){
         return UsuarioDao::CambioPass($user,$nueva_clave);
    }
   

}




?>