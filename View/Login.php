<?php
session_start();
if (isset($_SESSION["tipo"])) {
  if($_SESSION["tipo"]=='usuario_regular') header("Location: HomeUsuarioRegular.php");
  if($_SESSION["tipo"]=='usuario_admin') header("Location: HomeUsuarioAdmin.php");
}
session_abort();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

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
                <h1>Formulario de ingreso</h1>
                <form action="../Controllers/Accions/LoginControl.php" method="POST">
                    <div class="form-group">
                        <input type="text"  name="username"  placeholder="Usuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password"  name="clave"  placeholder="Contraseña" class="form-control">
                    </div>
                    <input type="submit" value="Ingresar" class="btn btn-primary">
                    <p>¿no tienes una cuenta? <a href="signup.php">ingresa aqui</a></p>
                </form>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>