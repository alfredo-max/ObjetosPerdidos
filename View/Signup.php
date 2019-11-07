<?php
session_start();
if (isset($_SESSION["tipo"])) {
  if($_SESSION["tipo"]=='usuario_regular') header("Location: HomeUsuarioRegular.php");
  if($_SESSION["tipo"]=='usuario_admin') header("Location: HomeUsuarioAdmin.php");
}
session_abort();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/solid.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/all.css">

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row"><br><br><br></div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 bg-dark text-light">
                <h1>Formulario de Registro</h1>
                <form action="../Controllers/Accions/AccionSignUp.php" method="POST">
                    <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text"  name="nombre"  placeholder="Nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Usuario</label>
                        <input type="text"  name="username" placeholder="Usuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Contraseña</label>
                        <input type="password" name="clave"    placeholder="Contraseña" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Correo</label>
                        <input type="email"  name="correo"  placeholder="Correo" class="form-control">
                    </div>
                    <input type="submit" value="Registrar" class="btn btn-primary">
                    <p>¿ya tienes una cuenta? <a href="login.php">ingresa aqui</a></p>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html> 