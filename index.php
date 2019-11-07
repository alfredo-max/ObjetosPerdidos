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
  <div class="container">
    <div class="row"><br><br><br><br></div>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8 text-center bg-light">
          <h1>Bienvenido</h1>
          <a href="View/Login.php">Iniciar sesión aquí</a><br>
          <a href="View/Signup.php">Registrarse aqui</a>
      </div>
      <div class="col-sm-2"></div>
    </div>
  </div>
  
</body>
</html>


