<?php
session_start();
if (isset($_SESSION["tipo"])) {
  if($_SESSION["tipo"]=='usuario_regular') header("Location: View/HomeUsuarioRegular.php");
  if($_SESSION["tipo"]=='usuario_admin') header("Location: View/HomeUsuarioAdmin.php");
}
session_abort();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/solid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.css">

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="css/style.css"></script>
</head>
<body>
    <nav class="nav bg-dark text-light border">
      <ul class="nav">
        <li class="nav-item">
          <h1>Oficina de objetos perdidos</h1>
        </li>
      </ul>
    </nav>
    <div class="container-fluid">
      <div class="row row1">
        <div class="col-sm-4 bg-dark text-light">
          <h3>Bienvenid@</h3>
          <h5>Inicia sesión o registrate y usa nuestros servicios.</h5>
        </div>
        <div class="col-sm-8 text-center bg-light">
            <a class="btn btn-success" href="View/Login.php">Iniciar sesión aquí</a><br>
            <a class="btn btn-primary" href="View/Signup.php">Registrarse aqui</a>
        </div>
      </div>
    </div>
</body>
</html>


