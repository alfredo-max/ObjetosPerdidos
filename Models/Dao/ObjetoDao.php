
<?php
// UsuarioDao es la capa de acceso a datos mas cercana a la base de datos
// en esta se ejecutan las consultas, inserciones y de mas en la bdd
require_once ("Conexion.php");
 
    
   class ObjetoDao {
      public static function getObjeto($objeto){
         $cnx= Conexion::Conectar();
         $sql= "SELECT * FROM objetos where nombre=:nombre";
         $resultado= $cnx->prepare($sql);
         $resultado->bindValue(":nombre",$objeto->getNombre());
         $resultado->execute();
         $fila= $resultado->fetch();
         return $fila;
      }
      public static function getObjetos(){
         $cnx= Conexion::Conectar();
         $sql= "SELECT  id,nombre,descripcion,tipo,foto,estado,contacto,fecha_reporte FROM objetos";
         $resultado= $cnx->prepare($sql);
         $resultado->execute();
         $filas= $resultado->fetchAll();
         return $filas;    
      }
      public static function CambiarEstado($objeto,$estado){
         $cnx= Conexion::Conectar();
         $sql="UPDATE objetos SET estado = '$estado' WHERE objetos.id= :id";
         $resultado= $cnx->prepare($sql);
         $resultado->bindValue(":id",$objeto->getId());
         return  $resultado->execute();
      }
    
   }

?>