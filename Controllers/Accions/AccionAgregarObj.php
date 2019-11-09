<?php
require_once __DIR__.'/../../Models/Dao/ObjetoDao.php';
require_once __DIR__.'/../Controladores/UsuarioControlador.php';
require_once __DIR__.'/../../Models/Entidad/Usuario.php';
require_once __DIR__.'/../../Models/Entidad/Objeto.php';
class AgregarObj{
    public static function Agregar($nombre, $descripcion, $tipo, $contacto, $img, $user){
        $usuario = new UsuarioControlador();
        $usuario = $usuario->getUsuario($user);
        $usuarioid = $usuario->getId();
        $objeto = new Objeto();
        $objeto->setId($usuarioid);
        $objeto->setNombre($nombre);
        $objeto->setDescripcion($descripcion);

        //$tipo = ObjetoDao::getTipo($tipo);
        $objeto->setTipo($tipo);
        
        $objeto->setContacto($contacto);
        $objeto->setFoto($img);
        $objeto->setEstado(1);
        $date = date('Y-m-d H:i:s');
        $objeto->setFechaReporte($date);

        // $agregar = new ObjetoDao();
        $agregar = ObjetoDao::setObjeto($objeto);
        
        return $agregar;
    }

    public static function getIdNombre(){
        return ObjetoDao::Obj();
    }
}
?>