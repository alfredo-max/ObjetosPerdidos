<?php
session_start();
require_once("../../Controllers/Controladores/UsuarioControlador.php");
$usuario= UsuarioControlador::getUsuario($_GET["username"]);
$_SESSION["usuarioEditar"]=$usuario->getUserName();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/solid.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/all.css">

    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a href="../HomeUsuarioAdmin.php" class="nav-link">Inicio</a>
            </li>
        </ul>
        <?php
            echo '
                <ul class="nav navbar-nav ml-auto">
                    <li>
                        <a href="../../Controllers/Accions/AccionVerPerfil.php" class="nav-link active">';echo $_SESSION["usuario"];echo '</a>
                    </li>
                    <li>
                        <a href="../../Controllers/Accions/AccionLogOut.php" class="nav-link">Cerrar sesión</a>
                    </li>
                </ul>
                ';
            ?>
   </nav>

   <div class="container">
       <div class="row"><br><br><br></div>
       <div class="row">
           <div class="col-sm-4"></div>
           <div class="form col-sm-4 bg-dark text-light">
                <form action="../../Controllers/Accions/AccionEditUser.php" method='POST'>
                    <div class="form-group text-center"><h3>Editar Usuario</h3></div>
                    <div class="form-group">
                        <label for="EjemNombre">Nombre</label><br>
                        <input type="text"  name="nombre"  value="<?php echo $usuario->getNombre()?>" >
                    </div>
                    <div class="form-group">
                        <label for="EjemUsername">Usuario</label><br>
                        <input type="text"  name="username" value="<?php echo  $usuario->getUserName()?>" >   
                    </div>
                    <div class="form-group">
                        <label for="EjemEmail">Email</label><br>
                        <input type="email"  name="email"  value="<?php echo $usuario->getEmail()?>" >
                    </div>
                    <div class="form-group">
                        <label for="EjemTipoUsr">Tipo Usuario</label><br>
                        <input type="text"  name="tipo_usuario" value="<?php echo $usuario->getTipoUsuario()?>" >    
                    </div>
                    <div class="form-group">
                        <label for="EjemClave">Contraseña</label><br>
                        <input type="password"  name="clave" value="<?php echo $usuario->getClave()?>" >
                    </div>  
                    <input class="btn btn-success" type="submit" value="Actualizar">
                    <a class="btn btn-primary" href="UserNew.php">Crear otro usuario</a>
                </form>
           </div>
           <div class="col-sm-4"></div>
       </div>
       <div class="row"><br><br></div>
   </div>    
</body>
</html> 

