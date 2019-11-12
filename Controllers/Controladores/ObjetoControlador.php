<?php
require_once("../../Models/Dao/ObjetoDao.php");
require_once("../../Models/Entidad/Objeto.php");
class ObjetoControlador{
    
    public static function getObjeto($nombre){
        $Objeto= new Objeto();
        $Objeto->setNombre($nombre);
        $fila= ObjetoDao::getObjeto($Objeto);
        $Objeto->setId_usr($fila["id_usuario"]);
        $Objeto->setId($fila["id"]);
        $Objeto->setDescripcion($fila["descripcion"]);
        $Objeto->setTipo($fila["tipo"]);
        $Objeto->setFoto($fila["foto"]);
        switch($fila["estado"]){
            case 1:
            $Objeto->setEstado("perdido");
            break;
            case 2:
            $Objeto->setEstado("tramite");
            break;
            case 3:
            $Objeto->setEstado("entregado");
            break;
        }
        
        $Objeto->setContacto($fila["contacto"]);
        $Objeto->setFechaReporte($fila["fecha_reporte"]);
  
        return $Objeto;
    }
    
    public static function getObjetos(){
        return ObjetoDao::getObjetos();
    }
    
    public static function EntregarObj($idObj, $username){
        return ObjetoDao::Entrega($idObj, $username);
    }

    public static function FiltroObjetos(){
        return ObjetoDao::getObjetosDatatable();
    }

    public static function FiltroObjUR(){
        return ObjetoDao::getObjetosDatatableUR();
    }

}





?>