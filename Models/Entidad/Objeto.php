<?php
  class Objeto{
    private $id;
    private $nombre;
    private $descripcion;
    private $tipo;
    private $foto;
    private $estado;
    private $contacto;
    private $fecha_reporte;
    

    public function setId($id){
      $this->id=$id;
    }
    public function getId(){
      return $this->id;
    }
    public function getNombre(){
      return $this->nombre;
    }
    public function setNombre($nombre){
      $this->nombre=$nombre;
    }
    public function getDescripcion(){
      return $this->descripcion;
    }
    public function setDescripcion($descripcion){
     $this->descripcion=$descripcion;
    }
    public function getTipo(){
      return $this->tipo;
    }
    public function setTipo($tipo){
      $this->tipo=$tipo;
     }
   
    public function getFoto(){
      return $this->foto;
    }
    public function setFoto($foto){
       $this->foto=$foto;
    }
    public function getEstado(){
        return $this->estado;
      }
     public function setEstado($estado){
         $this->estado=$estado;
    }
    public function getContacto(){
        return $this->contacto;
      }
     public function setContacto($contacto){
         $this->contacto=$contacto;
    }
    public function getFechaReporte(){
        return $this->fecha_reporte;
      }
     public function setFechaReporte($fecha_reporte){
         $this->fecha_reporte=$fecha_reporte;
    }

  }
