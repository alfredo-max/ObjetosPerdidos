<?php

class Tramite {
  private $id;
  private $id_objeto;
  private $id_usuario;
  private $fecha;

  public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}

public function getId_objeto(){
    return $this->id_objeto;
}

public function setId_objeto($id_objeto){
    $this->id_objeto = $id_objeto;
}

public function getId_usuario(){
    return $this->id_usuario;
}

public function setId_usuario($id_usuario){
    $this->id_usuario = $id_usuario;
}

public function getFecha(){
    return $this->id_fecha;
}

public function setFecha($id_fecha){
    $this->id_fecha = $id_fecha;
}



}


?>