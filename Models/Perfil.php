<?php

class Perfil 
{
       private $idPerfil;
       private $nombre;

       public function __construct()
       {
        $this->idPerfil =null;
        $this->nombre = null;
        }

       
       public function setIdPerfil($var)
       {
           $this->idPerfil= $var;
       }

       public function setNombre($var)
       {
           $this->nombre= $var;
       }

       public function getIdPerfil()
       {
           return $this->idPerfil;
       }
       
       public function getNombre()
       {
           return $this->nombre;
       }
       
}


?>