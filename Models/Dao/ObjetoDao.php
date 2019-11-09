
<?php
// UsuarioDao es la capa de acceso a datos mas cercana a la base de datos
// en esta se ejecutan las consultas, inserciones y de mas en la bdd
require_once __DIR__."/Conexion.php";
require_once __DIR__.'/../Entidad/Objeto.php';
require_once __DIR__.'/../Entidad/Usuario.php';
 
    
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

      public static function Entrega($idObj, $username){
         $cnx = Conexion::Conectar();
         $sql = "UPDATE objetos set estado = :valor where id = :idObj";
         $resultado1 = $cnx->prepare($sql);
         $resultado1->bindValue(":idObj",$idObj);
         $resultado1->bindValue(":valor",3);
         $resultado1->execute();

         //Datos del objeto
         //$sql= "SELECT * FROM objetos where id=:id";
         //$resultado2= $cnx->prepare($sql);
         //$resultado2->bindValue(":id",$idObj);
         //$resultado2->execute();
         //$filaObj = $resultado2->fetch();

         //Datos del usuario
         $cnx= Conexion::Conectar();
         $sql= "SELECT * FROM usuario where username=:user";
         $resultado= $cnx->prepare($sql);
         $resultado->bindValue(":user",$username);
         $resultado->execute();
         $filaUsr= $resultado->fetch();

         //Obtengo id del objeto y de el usr
         //$id_obj = $filaObj["id"];
         $id_usr = $filaUsr["id_usuario"];

         $sql = "INSERT INTO tramite ( id, id_objeto, id_usuario, fecha) VALUES ( ?, ?, ?, ?)";
         $resultado3 = $cnx->prepare($sql);
         
         $resultado3 = $resultado3->execute(['',$idObj,$id_usr,date('Y-m-d H:i:s')]);
         return 1;
      }

      public static function getObjetosTipo($tipo){
         $cnx = Conexion::Conectar();
         $sql = "SELECT * from objetos where tipo = :tipo";
         $resultado = $cnx->prepare($sql);
         $resultado->bindValue(":tipo",$tipo);
         $resultado->execute();

         return $resultado->fetchAll();
      }
   }

?>