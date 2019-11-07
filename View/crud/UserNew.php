
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
        session_start();
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
           <div class="col-4"></div>
           <div class="col-4 bg-dark text-light">
                <div class="row bg-transparent"><div class="col-12 text-center"><h3> Crear Usuario</h3></div></div>
                    <div class="form col-12 bg-transparent">
                        <form action="../../Controllers/Accions/AccionUserNew.php" method="POST">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="form-group">
                                    <label for="EjemNombre">   Nombre</label><br>
                                    <input type="text"  name="nombre"  placeholder="Nombre" >
                                </div>
                                <div class="form-group">
                                    <label for="EjemUsuario">  Usuario</label><br>
                                    <input type="text"  name="username" placeholder="Usuario" >                            
                                </div>
                                <div class="form-group">
                                    <label for="EjemContraseña">Contraseña</label><br>
                                    <input type="password" name="clave"    placeholder="Contraseña" >
                                </div>
                                <div class="form-group">
                                    <label for="EjemCorreo">Correo</label><br>
                                    <input type="email"  name="correo"  placeholder="Correo" >
                                </div>
                                <div class="form-group">
                                    <label for="EjemTipo_usuario">Tipo Usuario</label><br>
                                    <input type="text"  name="tipo_usuario"  placeholder="Tipo de usuario" >
                                </div>
                                <input  type="submit" value="Registrar" class="btn btn-success"><br><br>
                                <a class="btn btn-primary" href="UserNew.php">Crear usuario</a>
                            </div>
                            <div class="col-1"></div>
                        </form>
                    </div>
                    <div class="row"><br><br></div>
                </div>
           <div class="col-sm-4"></div>
       </div>
       <div class="row"><br><br><br></div>
   </div>
</body>
</html> 