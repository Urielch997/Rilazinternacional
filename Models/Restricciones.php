<?php 
 class Restricciones
 {
     private $idConfig;
     private $identificador;
     private $perfil;
     private $idTabla;

     
    public function __construct()
    {
     
        $this->idConfig = null;
        $this->identificador = null;
        $this->perfil = null;
        $this->idTabla = null;
       
    }

    /**Setter */
    public function setIdConfig($var)
    {
        $this->idConfig = $var;
    }
    public function setIdentificador($var)
    {
        $this->identificador = $var;
    }
    public function setPerfil($var)
    {
        $this->perfil = $var;
    }
    public function setIdTabla($var)
    {
        $this->idTabla = $var;
    }
    /**Getter */

    public function getIdConfig()
    {
        return $this->idConfig;
    }

    public function getIdentificador()
    {
        return $this->identificador;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }

    public function getIdTabla()
    {
        return $this->idTabla;
    }

    

}
    
?>