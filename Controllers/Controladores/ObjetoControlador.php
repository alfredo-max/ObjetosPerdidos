<?php
require("../../Models/Dao/ObjetoDao.php");

class ObjetoControlador{
  
    public static function getObjetos(){
        return ObjetoDao::getObjetos();
    }
    




}





?>