<?php
    session_start();
    $imagenEscapes=null;
    if(isset($_FILES["imgObj"]["tmp_name"]) && is_uploaded_file($_FILES["imgObj"]["tmp_name"])){
        // $info=getimagesize($_FILES["imgObj"]["tmp_name"]);
        // Obtiene el formato de imagen nuevamente para asignarlo al nombre
        // $tipo=$_FILES["imgObj"]["type"];
        // Asigna un nombre aleatorio
        // $nom=md5(time().rand(500,100000),FALSE)."_.$tipo";
        // Guarda el contenido de la imagen codificado con base 64 
        
        //$imagenEscapes=base64_encode(file_get_contents($_FILES["imgObj"]["tmp_name"]));
        $imagen = $_FILES["imgObj"]["tmp_name"];
        $size = $_FILES["imgObj"]["size"];
        $imagen = fopen($imagen, 'r');
        $imagenEscapes = fread($imagen,$size);
        fclose($imagen);
    }
    $agregado=null;
    if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["tipo"]) && isset($_POST["contacto"]) && isset($imagenEscapes)){
        require_once __DIR__.'/../../Controllers/Accions/AccionAgregarObj.php';
        $NomObj = $_POST["nombre"];
        $DescObj = $_POST["descripcion"];
        $tipo = $_POST["tipo"];
        $contacto = $_POST["contacto"];

        $agregar = new AgregarObj();
        $agregado = $agregar->Agregar($NomObj,$DescObj,$tipo,$contacto,$imagenEscapes,$_SESSION["usuario"]);
    }

    session_abort();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de objetos</title>

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
    if (isset($agregado) && $agregado==1) {
        echo "<div class='alert alert-success' role='alert'>
                    Objeto agregado!!
                </div>";
    }else if($agregado!=null){
        echo '<div class="alert alert-danger" role="alert">
                    Objeto no agregado!!
                </div>';
    }
    ?>
   <div class="container-fluid bg-dark">
        <div class="row">
            <div class="col-sm-4 border border-dark modal-content">
                <div class="modal-dialog text-light" role="document">
                    <br><br><br><h3 >Agregar Objeto</h3><br>
                </div>
            </div>
            <div class="col-sm-8 border border-dark bg-light">
                <div class="row"><br><br></div>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="colsm-8">
                        <div class="form">
                            <h4>Los campos corresponden al objeto</h4>
                            <form action="" class="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="NombreObj">Nombre</label>
                                    <input required type="text" name="nombre" id="Nombre" class="form-control border border-dark">
                                </div>
                                <div class="form-group">
                                    <label for="DescipcionObj">Descripción</label>
                                    <textarea required class="form-control border border-dark" name="descripcion" id="descripcion" cols="30" rows="6" placeholder="Aquí la decripción del objeto"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="TipoObj">Tipo</label>
                                    <select name="tipo" id="tipo" class="form-control border border-dark">
                                        <?php
                                        require_once __DIR__.'/../../Controllers/Accions/AccionAgregarObj.php';
                                        $IdNombre = AgregarObj::getIdNombre();
                                        foreach($IdNombre as $fila){
                                            $id = $fila["id"];
                                            $nombre = $fila["nombre"];
                                            echo "<option value='$id'>";echo $nombre."</option>";
                                        }
                                        ?>
                                        <!--<option value="celular">Celular</option>
                                        <option value="carro">Carro</option>
                                        <option value="moto">Moto</option>
                                        <option value="computador">Computador</option>-->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ImgObj">Imagen</label>
                                    <input required type="file" name="imgObj" id="imgObj" accept="image/jpeg" class="form-control border border-dark" placeholder="elige un archivo">
                                </div>
                                <div class="form-group">
                                    <label for="Contacto">Contacto</label>
                                    <input required type="number" name="contacto" id="contacto" placeholder="#" class="form-control border border-dark">
                                </div>
                                <button type="submit" class="btn btn-success" >Guardar</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
   </div>

   <!--
    <div class="container-fluid bg-light">
        <div class="row" style="height=300px">
            <div class="col-sm-4">
                <h3>Agregar</h3>
            </div>
            <div class="col-sm-8">
                <h5>Datos</h5>
            </div>
        </div>
   </div>
   -->

   <script>
   function volver() {
       history.go(-1);
   }
   </script>
</body>
</html>