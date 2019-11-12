<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Filtrar Objetos</title>

    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/solid.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/all.css">
    <link rel="stylesheet" href="../../css/Datatable/dataTables.bootstrap4.css">

    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../../js/popper.min.js"></script>

    <!--<script src="../../js/Datatable/jquery.dataTables.min.js"></script>-->
    <script type="text/javascript" src="../../js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="../../js/Datatable/jquery.dataTables.min.js"></script>
    
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
        <div class="row">
            <div class="col-3">
                <div class="modal-dialog">
                    <div class="modal-content text-light">        
                        <h3>Filtro de Objetos</h3>
                    </div>
                </div>
            </div>
            <div class="col-9"><br>
                <table class="table table-sm" id="tablaObjetos">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Contacto</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    require_once "../../Controllers/Controladores/ObjetoControlador.php";
                    $filas = ObjetoControlador::FiltroObjUR();
                    foreach ($filas as $fila) {
                        echo "<tr>";
                        $nombre = $fila["nombre"];
                        $desc = $fila["descripcion"];
                        $estado = $fila["estado"];
                        $contacto = $fila["contacto"];
                        $fecha = $fila["fecha_reporte"];
                        switch ($estado) {
                            case 1:
                                $estado='Pendiente';
                                break;
                            case 2:
                                $estado='Tramite';
                                break;
                            case 3:
                                $estado='Entregado';
                                break;
                            default:
                                $estado='null';
                                break;
                        }
                        echo"
                            <td>$nombre</td>
                            <td>$desc</td>
                            <td>$estado</td>
                            <td>$contacto</td>
                            <td>$fecha</td>
                            "."</tr>";
                    }   
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../../js/Busqueda.js"></script>
</body>
</html>

<script>
    $(document).ready(function () {
        $('#tablaObjetos').DataTable();
    });
</script>