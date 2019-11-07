<?php
  class Usuario{
    private $id;
    private $username;
    private $clave;
    private $email;
    private $nombre;
    private $tipoUsuario;
    

    public function setId($id){
      $this->id=$id;
    }
    public function getId(){
      return $this->id;
    }
    public function getUserName(){
      return $this->username;
    }
    public function setUserName($username){
      $this->username=$username;
    }
    public function getClave(){
      return $this->clave;
    }
    public function setClave($clave){
     $this->clave=$clave;
    }
    public function getEmail(){
      return $this->email;
    }
    public function setEmail($email){
      $this->email=$email;
     }
    public function getNombre(){
      return $this->nombre;
    }
    public function setNombre($nombre){
     $this->nombre=$nombre;
    }
    public function getTipoUsuario(){
      return $this->tipoUsuario;
    }
    public function setTipoUsuario($tipo_usuario){
       $this->tipoUsuario=$tipo_usuario;
    }
  }

?>