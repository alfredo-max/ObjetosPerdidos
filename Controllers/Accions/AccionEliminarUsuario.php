<?php
require_once (__DIR__."../../../Models/Dao/UsuarioDao.php");
if(isset($_GET["usr"])){
    $usr = $_GET["usr"];
    if ($usr!='') {
        $eliminar = UsuarioDao::EliminarUsuario($usr);
        header("Location: ../../View/crud/crud.php?elim=$eliminar");
    }
}
?>