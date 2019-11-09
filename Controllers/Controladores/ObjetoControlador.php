<?php
require("../../Models/Dao/ObjetoDao.php");
require("../../Models/Entidad/Objeto.php");
class ObjetoControlador{
    
    public static function getObjeto($nombre){
        $Objeto= new Objeto();
        $Objeto->setNombre($nombre);
        $fila= ObjetoDao::getObjeto($Objeto);
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
    




}





?>