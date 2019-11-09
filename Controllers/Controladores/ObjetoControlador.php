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
        $Objeto->setEstado($fila["estado"]);
        $Objeto->setContacto($fila["contacto"]);
        $Objeto->setFechaReporte($fila["fecha_reporte"]);
  
        return $Objeto;
    }
    public static function getObjetos(){
        return ObjetoDao::getObjetos();
    }
    




}





?>