<?php
class TipoContenido
{
    private $idTipoContenido;
    private $nombreContenido;
    
    public function __construct()
    {
        $this->idTipoContenido=null;
        $this->nombreContenido=null;
    }
    /**setter */
    public function setIdTipoContenido($var)
    {
        $this->idTipoContenido =$var;
    }
    public function setNombreContenido($var)
    {
        $this->nombreContenido = $var;
    }
    /**Getter */
    public function getIdTipoContenido()
    {
        return $this->idTipoContenido;
    }
    public function getNombreContenido()
    {
        return $this->nombreContenido;
    }
}

//$obj = new TipoContenido();

//$obj->setNombreContenido("Este es el nombre del Tipo de contenido en cuestion");
//echo $obj->getNombreContenido();
?>