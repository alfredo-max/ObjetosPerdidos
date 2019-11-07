<?php

require_once(__DIR__."/../Controladores/UsuarioControlador.php");
require_once(__DIR__."/../../Models/Entidad/Usuario.php");
//session_start();
if(!isset($_SESSION["usuario"])){
 header("Location:../../index.html");
}

$usuario= UsuarioControlador::getUsuario($_SESSION["usuario"]);
?>