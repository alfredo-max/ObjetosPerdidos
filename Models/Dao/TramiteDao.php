<?php
require_once ("Conexion.php");

    class TramiteDao{

         public static function setTramite($usuario,$objeto,$fecha){

                $cnx= Conexion::Conectar();
                 $idusuario= $usuario->getId();
                 $idobjeto= $objeto->getId();
                 $sql= "INSERT INTO tramite (id_objeto,id_usuario,fecha) VALUES ('$idobjeto','$idusuario','$fecha')";
                 $resultado= $cnx->prepare($sql);
                 return  $resultado->execute();
         }
         public static function DeleteTramite($usuario,$objeto){

            $cnx= Conexion::Conectar();
             $idusuario= $usuario->getId();
             $idobjeto= $objeto->getId();
            $sql="DELETE FROM tramite WHERE tramite.id_objeto =$idobjeto AND tramite.id_usuario =$idusuario";
             $resultado= $cnx->prepare($sql);
             return  $resultado->execute();
        }

        public static function BuscarTramite($usuario,$objeto){
         $cnx= Conexion::Conectar();
         $idusuario= $usuario->getId();
         $idobjeto= $objeto->getId();
         $sql= "SELECT * FROM tramite where id_usuario=$idusuario AND id_objeto=$idobjeto'";
         $resultado= $cnx->prepare($sql);
         $resultado->execute();
         $numfila= $resultado->rowCount();
         return $numfila;
        }


    }


?>