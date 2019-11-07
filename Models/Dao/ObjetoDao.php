
<?php
// UsuarioDao es la capa de acceso a datos mas cercana a la base de datos
// en esta se ejecutan las consultas, inserciones y de mas en la bdd
require("Conexion.php");
 //require (__DIR__."/../Entidad/Objeto.php");
    
   class ObjetoDao {
     
      public static function getObjetos(){
         $cnx= Conexion::Conectar();
         $sql= "SELECT  id,nombre,descripcion,tipo,foto,estado,contacto,fecha_reporte FROM objetos";
         $resultado= $cnx->prepare($sql);
         $resultado->execute();
         $filas= $resultado->fetchAll();
         return $filas;    
      }
    
   }

?>