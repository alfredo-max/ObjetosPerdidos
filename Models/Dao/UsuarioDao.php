
<?php
// UsuarioDao es la capa de acceso a datos mas cercana a la base de datos
// en esta se ejecutan las consultas, inserciones y de mas en la bdd
require_once("Conexion.php");
 require_once (__DIR__."/../Entidad/Usuario.php");
    
   class UsuarioDao {
     
      public static function Login($usuario){
          $cnx=Conexion::Conectar();
          $sql="SELECT * FROM usuario WHERE username = :username AND CLAVE= :clave";    
          $resultado= $cnx->prepare($sql); 
          $resultado->bindValue(":username",$usuario->getUsername());
          $resultado->bindValue(":clave",$usuario->getClave());
          $resultado->execute();
          $numeroDeRegistro=$resultado->rowCount();
          if($numeroDeRegistro!=0){
             
             $filas=$resultado->fetch();
             $usuario= new Usuario();
             $usuario->setId($filas["id_usuario"]);
             $usuario->setUsername($filas["username"]);
             $usuario->setClave($filas["clave"]);
             $usuario->setNombre($filas["nombre"]);
             $usuario->setEmail($filas["email"]);
             $usuario->setTipoUsuario($filas["tipo_usuario"]);           
             return $usuario;
            
          }else{
             return null;
          }

      }

      public static function InsertarUsuario($usuario){
         $cnx=Conexion::Conectar();          // verifico si ya hiciste este usuario
         $verificarUsuario= "SELECT username FROM USUARIO WHERE username=:user";
         $resultado= $cnx->prepare($verificarUsuario);
         $resultado->bindValue(":user",$usuario->getUserName());
         $resultado->execute();
         // si ya hiciste
         if($resultado->rowCount()>0){             
             return false;
         }else{
            $user=$usuario->getUserName();
            $pass=$usuario->getClave();
            $email=$usuario->getEmail();
            $nombre=$usuario->getNombre();
            $tipo=$usuario->getTipoUsuario();

            $sql="INSERT INTO usuario(username,clave,email,nombre,tipo_usuario) Values ('$user','$pass','$email','$nombre','$tipo')";  
      
            $resultado=$cnx->prepare($sql);          
            return $resultado->execute();

         }
          
      }

      public static function getUsuario($usuario){
         $cnx= Conexion::Conectar();
         $sql= "SELECT * FROM usuario where username=:user";
         $resultado= $cnx->prepare($sql);
         $resultado->bindValue(":user",$usuario->getUserName());
         $resultado->execute();
         $fila= $resultado->fetch();
         return $fila;
      }

      public static function getUsuarios(){
         $cnx= Conexion::Conectar();
         $sql= "SELECT  username,email,nombre,tipo_usuario FROM usuario";
         $resultado= $cnx->prepare($sql);
         $resultado->execute();
         $filas= $resultado->fetchAll();
         return $filas;         
      }

      public static function EliminarUsuario($usr){
         $cnx = Conexion::Conectar();
         $sql = "DELETE from usuario where username=:usr";
         $resultado = $cnx->prepare($sql);
         $resultado->bindValue(":usr",$usr);
            return $resultado->execute();
      }

      public static function EditarUsuario($consulta,$username){
          $cnx= Conexion::Conectar();
          $sql = "UPDATE usuario SET $consulta WHERE username='$username'";
          $resultado= $cnx->prepare($sql);
         //  $resultado->bindValue(":con",$consulta);
         //  $resultado->bindValue(":user",$username);
        return $resultado->execute();
        // return $sql;
                 
      }

      public static function CambioPass($username, $contrasena){
         $cnx = Conexion::Conectar();
         $sql = "UPDATE usuario set clave = '$contrasena' where username = '$username' ";
         $resultado = $cnx->prepare($sql);
         return $resultado->execute();
      }
    
   }




?>