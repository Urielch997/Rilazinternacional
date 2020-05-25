<?php
include("Marca.php");
include("TipoContenido.php"); 
class Publicacion
{
    private $idPublicacion;
    private $tipContenido;
    private $marca ;
    private $titulo;
    private $footer;
    private $fecha;
    private $contenido;

    public function __construct()
    {
        $this->idPublicacion=null;
        $this->tipContenido=null;
        $this->marca=null;
        $this->titulo=null;
        $this->footer=null;
        $this->fecha=null;
        $this->contenido=null;
    }

    /**Setter */
    public function setIdPublicacion($var)
    {
        $this->idPublicacion = $var;
    }
    public function setTipoContenido($var)
    {
        $this->tipoContenido = $var;
    }
    public function setMarca($var)
    {
        $this->marca =$var;
    }
    public function setTitulo($var)
    {
        $this->titulo =$var;
    }
    
    public function setFooter($var)
    {
        $this->footer = $var;
    }
    public function setFecha($var)
    {
        $this->fecha =$var;
    }
    public function setContenido($var)
    {
        $this->contenido =$var;
    }
    /**Getter */
    public function getIdPublicacion()
    {
        return $this->idPublicacion;
    }
    public function getTipoContenido()
    {
        return $this->tipContenido;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getFooter()
    {
        return $this->footer;
    }
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getContenido()
    {
        return $this->contenido;
    }
}



?>