
<?php
session_start();
if (isset($_SESSION["tipo"])) {
  if($_SESSION["tipo"]=='usuario_regular') header("Location: HomeUsuarioRegular.php");
}
session_abort();
session_start();
// si no se ha iniciado seccion
if(!isset($_SESSION["usuario"])){
   header("Location:../index.html");
}
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
    <style>
     table,th,td{
        border: 1px solid black;      
     }
     table{
        width: 60%;
     }
    </style>
</head> 

<body>

   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a href="HomeUsuarioAdmin.php" class="nav-link">Inicio</a>
            </li>
        </ul>
        <?php
            echo '
                <ul class="nav navbar-nav ml-auto">
                    <li>
                        <a href="perfil.php" class="nav-link active">';echo $_SESSION["usuario"];echo '</a>
                    </li>
                    <li>
                        <a href="../Controllers/Accions/AccionLogOut.php" class="nav-link">Cerrar sesión</a>
                    </li>
                </ul>
                ';
            ?>
   </nav>
     <div class="container">
         <div class="row"><br><br><br></div>
         <div class="row">
             <div class="col-md-3"></div>
             <div class="col-md-6 bg-dark text-light text-center"><br><br><br>
                <h3>Hola Administrador <?php echo $_SESSION["usuario"]?></h3><br><br><br>
                <a class="btn btn-primary" href="crud/crud.php">CROUD</a> <br><br>
                <a class="btn btn-primary" href="perfil.php">Mi perfil</a><br><br>
                <a class="btn btn-primary" href="crudobj/RegObj.php">Registrar Objeto</a><br><br>
             </div>
             <div class="col-md-3"></div>
         </div>
     </div>
</body>
</html>
