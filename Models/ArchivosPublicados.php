<?php
include("publicacion.php");

class ArchivosPublicacion extends Publicacion
{
    private $idArchivo;
    private $publicacion;
    private $ruta;

    public function __construct()
    {
        $this->idArchivo = null;
        $this->publicacion = null;
        $this->ruta = null;
    }

    /**Setter */
    public function setIDArchivo($var)
    {
        $this->idArchivo = $var;
    }
    public function setPublicacion($var)
    {
        $this->publicacion = $var;
    }
    public function setRuta($var)
    {
        $this->ruta= $var;
    }
    /**Getter */
    public function getidArchivo()
    {
        return $this->idArchivo;
    }
    public function getPublicacion()
    {
        return $this->publicacion;
    }
    public function getRuta()
    {
        return $this->ruta;
    }
}

?>