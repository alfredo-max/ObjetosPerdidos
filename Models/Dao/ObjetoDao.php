
<?php
// UsuarioDao es la capa de acceso a datos mas cercana a la base de datos
// en esta se ejecutan las consultas, inserciones y de mas en la bdd
//require_once __DIR__."/Conexion.php";
require_once __DIR__.'/../Entidad/Objeto.php';
 
    
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
    
      public static function setObjeto($objeto){
         $cnx = Conexion::Conectar();
         $sql = "INSERT INTO  objetos ( id, id_usuario, nombre, descripcion, tipo, foto, estado, contacto,
         fecha_reporte) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         $resultado = $cnx->prepare($sql);
         $Objid = $objeto->getId();
         $nombre = $objeto->getNombre();
         $descripcion = $objeto->getDescripcion();
         $tipo = $objeto->getTipo();
         $foto = $objeto->getFoto();
         $estado = $objeto->getEstado();
         $contacto = $objeto->getContacto();
         $fecha = $objeto->getFechaReporte();
         $resultado = $resultado->execute(['',$Objid,$nombre,$descripcion,$tipo,$foto,$estado,$contacto,$fecha]);
         return $resultado;
      }

      public static function getTipo($tipo){
         $cnx = Conexion::Conectar();
         $sql = "SELECT id from tipo_objeto where nombre = :nombre";
         $resultado = $cnx->prepare($sql);
         $resultado->bindValue(":nombre",$tipo);
         $resultado->execute();
         $fila = $resultado->fetch();
         return $fila;
      }
      public static function Obj(){
         $cnx = Conexion::Conectar();
         $sql = "SELECT id, nombre from tipo_objeto";
         $resultado = $cnx->prepare($sql);
         $resultado->execute();
         return $resultado->fetchAll();
      }
   }

?>