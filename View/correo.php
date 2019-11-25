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
    <script src="../css/style.css"></script>
</head>
<body>
<!-- ../mensajeGmail.php -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a href="HomeUsuarioRegular.php" class="nav-link">Inicio</a>
            </li>
        </ul>
        <?php
            session_start();
            echo '
                <ul class="nav navbar-nav ml-auto">
                    <li>
                        <a href="Login.php" class="nav-link">Volver Atras</a>
                    </li>
                </ul>
                ';
            ?>
    </nav>
       
    <div class="container">
    <div class="row"><br><br><br><br></div>
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8 text-center bg-light">
      <form action="../Controllers/Controladores/enviarcorreoControlador.php" method="POST">
    <label for="gmail">ingrese su gmail</label>
    <input type="email" id="email" name="email" />
    <input type="submit" value="enviar">
    </form>
      </div>
      <div class="col-sm-2"></div>
    </div>
  </div>
  


</body>
</html>