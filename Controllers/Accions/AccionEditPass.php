<?php
require(__DIR__."/../../Models/Dao/UsuarioDao.php");
if (isset($_POST["contrasena"])) {
    if ($_POST["contrasena"]!='') {
        $pass = $_POST["contrasena"];
        session_start();
        $cambio = UsuarioDao::CambioPass($_SESSION["usuario"],$pass);
        header("Location: ../../View/perfil.php");
    }
}
?>