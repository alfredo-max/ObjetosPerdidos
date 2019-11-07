<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
           <div class="col-sm-4"></div>
           <div class="col-sm-4 bg-dark text-light text-center form">
                <div class="row">
                    <div class="col-sm-12"><br><h3>Cambio de contraseña</h3></div>
                </div>
                <form action="../../Controllers/Accions/AccionEditPass.php" method="post">
                    <div class="form-group">
                        <label for="EjemNewPssw">Nueva contraseña</label>
                        <input type="password" name="contrasena" placeholder="****">
                    </div>
                    <button type="submit" class="btn btn-success">Cambiar</button>
                </form>     
                <a class="btn btn-primary" href="../perfil.php">Volver</a><br><br>
           </div>
           <div class="col-sm-4"></div>
       </div>
       <div><br><br><br></div>
   </div>
</body>
</html>