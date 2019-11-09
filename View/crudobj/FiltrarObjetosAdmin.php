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
        <div class="row">
            <div class="col-4">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="form">
                                <form action="FiltrarObjetosAdmin.php" method="post">
                                    <div class="form-group text-light">
                                        <label for="EligeOpcion">Filtrar Por:</label>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-secondary" onclick="_tipo()">Tipo</button>
                                            <button type="button" class="btn btn-secondary" onclick="_estado()">Estado</button>
                                            <button type="button" class="btn btn-secondary" onclick="_tipoestado()">Tipo/Estado</button>
                                        </div>
                                    </div>
                                    <div class="form-group text-light" id="Div_tipo">
                                        <label for="TipoObj">Tipo</label>
                                        <select name="tipo" id="" class="form-control border border-dark">
                                            <option value=""></option>
                                            <?php
                                            require_once __DIR__.'/../../Controllers/Accions/AccionAgregarObj.php';
                                            $IdNombre = AgregarObj::getIdNombre();
                                            foreach($IdNombre as $fila){
                                                $id = $fila["id"];
                                                $nombre = $fila["nombre"];
                                                echo "<option value='$id'>";echo $nombre."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group text-light" id="Div_estado">
                                        <label for="EstadoObj">Estado</label>
                                        <select name="estado" id="" class="form-control border border-dark">
                                            <option value=""></option>
                                            <option value="1">Perdido</option>
                                            <option value="2">En tramite</option>
                                            <option value="3">Entregado</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="btnbuscar">
                                        <button name="buscar" type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-8">
                <?php
                    if(isset($_POST["buscar"])){
                        require_once __DIR__.'/../../Controllers/Controladores/ObjetoControlador.php';
                        if(isset($_POST["tipo"])&&isset($_POST["estado"])){

                        }else if(isset($_POST["tipo"])){
                            echo'<table class="table">';
                            echo'<thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Contacto</th>
                                        <th scope="col">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>';
                            $filas = ObjetoDao::getObjetosTipo($_POST["tipo"]);
                            foreach ($filas as $fila) {
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
                                    ";
                            }
                            echo'   </tr>
                                </table>';
                        }else if(isset($_POST["estado"])){
                            
                        }else{
                            echo '<div class="alert alert-danger" role="alert">
                                    Selecciona una opción!!
                                    </div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <script src="../../js/Busqueda.js"></script>
</body>
</html>