<?php
session_start();
if(!isset($_SESSION["usuario"])){
    header("Location:../../index.php");
}
require("../../Controllers/Controladores/ObjetoControlador.php");
$filasObjetos=ObjetoControlador::getObjetos();
session_abort();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista de Objetos</title>

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

    <div class="container-fluid bg-light">
        <div class="row"><br></div>
        <div class="row">
            <div class="col-4 bg-dark table"><br><br>
                <h1 class="text-light">Lista de objetos perdidos</h1>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-12">
                    <table id="tabla" class="table table-dark text-light">
                        <thead class="table-thead">
                            <tr>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Contacto</th>
                            <th>Fecha Reporte</th>
                            <th>Estado</th>
                            <th>Accions</th>
                        </thead>

                        <tbody>
                                <?php
                                    foreach($filasObjetos as $objetos){
                                        switch($objetos['estado']){
                                            case 1:
                                                $objetos['estado'] = 'pendiente';
                                                break;
                                            case 2:
                                                $objetos['estado'] = 'tramite';
                                                break;
                                            case 3:
                                                $objetos['estado'] = 'entregado';
                                                break;
                                            default:
                                                $objetos['estado'] = 'Sin estado';
                                                break;
                                        }
                                    ?>
                                    <tr>
                                        <td><?php echo $objetos['nombre']?></td>
                                        <td> <img width="80" height="80" src="data:image/jpg;base64,<?php echo base64_encode($objetos['foto']);?>" alt="hola"></td>
                                        <td><?php echo $objetos['contacto']?></td>
                                        <td><?php echo $objetos['fecha_reporte']?></td>
                                        <td><?php echo $objetos['estado']?></td>
                                        <td><a href='Entregar.php?nombre=<?php echo $objetos['nombre']?>'>Ver más</a></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>