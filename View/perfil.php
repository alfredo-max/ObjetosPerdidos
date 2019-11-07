<?php
session_start();
if (!isset($_SESSION["tipo"])) {
    header("Location: ../index.php");
}
session_abort();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                        <a href="../Controllers/Accions/AccionVerPerfil.php" class="nav-link active">';echo $_SESSION['usuario'];echo '</a>
                    </li>
                    <li>
                        <a href="../controlador/logout.php" class="nav-link">Cerrar sesión</a>
                    </li>
                </ul>
                ';
            ?>
    </nav>

    <div class="container">
        <div class="row"><br><br></div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 text-center bg-dark text-light">
                <br><br><h3>Perfil</h3><br>
                <?php
                require ("../Controllers/Accions/AccionVerPerfil.php");
                $nombre = $usuario->getNombre();
                $usrname = $usuario->getUserName();
                $email = $usuario->getEmail();
                $tipo = $usuario->getTipoUsuario();
                echo "<span class='text-light'>Nombre: $nombre</span><br><br>";
                echo "<span class='text-light'>Alias: $usrname</span><br><br>";
                echo "<span class='text-light'>Email: $email</span><br><br>";
                echo "<span class='text-light'>Tipo: $tipo</span><br><br>";
                echo "<a class='btn btn-primary' href='../index.php'>Volver</a>";
                echo "<a class='btn btn-primary' href='crud/Editarpssw.php?username=$usrname'>Editar contraseña</a><br><br>";
                ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row"><br><br></div>
    </div>
</body>
</html>