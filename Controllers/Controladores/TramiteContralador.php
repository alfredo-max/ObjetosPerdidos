<?php
// 
require_once(__DIR__."/UsuarioControlador.php");
require_once(__DIR__."/ObjetoControlador.php");
require_once(__DIR__."/../../Models/Dao/TramiteDao.php");
class TramiteControlador{
    
    public static function setTramite($nombreUsuario,$nombreObjeto,$fecha){
       $usuario=UsuarioControlador::getUsuario($nombreUsuario);
       $objeto=ObjetoControlador::getObjeto($nombreObjeto);
      
        return TramiteDao::setTramite($usuario,$objeto,$fecha);
    }
    public static function DeleteTramite($nombreUsuario,$nombreObjeto){
        $usuario=UsuarioControlador::getUsuario($nombreUsuario);
        $objeto=ObjetoControlador::getObjeto($nombreObjeto);
       
         return TramiteDao::DeleteTramite($usuario,$objeto);
     }
  


}


?>