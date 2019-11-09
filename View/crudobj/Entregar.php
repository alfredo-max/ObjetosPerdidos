<?php
require_once("../../Controllers/Controladores/ObjetoControlador.php");
$objeto;
if(isset($_GET["nombre"])){
    $objeto = ObjetoControlador::getObjeto($_GET["nombre"]);
}

$entregado=null;
if(isset($_GET["entregar"]) && isset($_GET["usrname"]) && isset($_GET["id"])){
    $username = $_GET["usrname"];
    $id = $_GET["id"];
    $entregado = ObjetoControlador::EntregarObj($id,$username);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles</title>

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
        session_abort();
        ?>
    </nav>

    <?php
    if (isset($entregado)) {
        echo '<div class="alert alert-success" role="alert">
                    Objeto entregado!!
                </div>';
    }
    ?>  

    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-5">
                <div class="form">
                    <form action="" class="form">
                        <div class="form-group">
                            <label for="RepPor">Reportado por:</label>
                            <?php echo "<input disabled class='form-control border border-dark' type='text' name='' id='' value='";echo $objeto->getId_usr()."'>"; ?>
                        </div>
                        <div class="form-group">
                            <label for="Nombreobj">Nombre del objeto:</label>
                            <?php echo "<input disabled class='form-control border border-dark' type='text' name='' id='' value='";echo $objeto->getNombre()."'>"; ?>                            
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <?php echo "<textarea disabled class='form-control border border-dark' type='text' name='' id='' value=''>";echo $objeto->getDescripcion()."</textarea>"; ?>                            
                        </div>
                        <div class="form-group">
                            <label for="tipoobj">Tipo de objeto:</label>
                            <?php echo "<input disabled class='form-control border border-dark' type='text' name='' id='' value='";echo $objeto->getTipo()."'>"; ?>                            
                        </div>
                        <div class="form-group">
                            <label for="estadoobj">Estado:</label>
                            <?php echo "<input disabled class='form-control border border-dark' type='text' name='' id='' value='";echo $objeto->getEstado()."'>"; ?>                            
                        </div>
                        <div class="form-group">
                            <label for="contactoobj">Contacto:</label>
                            <?php echo "<input disabled class='form-control border border-dark' type='text' name='' id='' value='";echo $objeto->getContacto()."'>"; ?>                            
                        </div>
                        <div class="form-group">
                            <label for="fechaobj">Fecha de reporte:</label>
                            <?php echo "<input disabled class='form-control border border-dark' type='text' name='' id='' value='";echo $objeto->getFechaReporte()."'>"; ?>                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-7">
                <div class="row">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="form">
                                <div class="row text-center"><br>
                                    <div class="col-3"></div>
                                    <div class="col-6"><img  src="data:image/jpg;base64,<?php echo base64_encode($objeto->getFoto());?>" alt="hola"></div>
                                    <div class="col-3"></div>
                                </div>
                                
                                <form action="Entregar.php" method="get">
                                    <div class="form-group" style="display:none;">
                                    <?php echo "<input method='get' class='form-control border border-dark' type='text' name='nombre' value='";echo $_GET["nombre"]."'>"?>
                                    </div>
                                    <div class="form-group text-light" style="display:none;">
                                        <label for="Id">Id del objeto:</label>
                                        <?php echo "<input class='form-control border border-dark' type='text' name='id' value='";echo $objeto->getId()."'>"?>
                                    </div>
                                    <div class="form-group text-light">
                                        <label for="Username">Usuario al que entregará:</label>
                                        <input class="form-control border border-dark" type="text" name="usrname" id="usrname">
                                    </div>
                                    <button class="btn btn-success" name="entregar" type="submit">Entregar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>