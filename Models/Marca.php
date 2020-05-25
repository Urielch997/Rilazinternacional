<?php 
 class Marca
 {
     private $idMarca;
     private $nombreMarca;

     
    public function __construct()
    {
        $this->idMarca=null;
        $this->nombreMarca=null;
    }
    

     /*setter*/
     public function setIDMarca($var)
     {
         $this->idMarca = $var;
     }
     public function setNombreMarca($var)
     {
         $this->nombreMarca = $var;
     }
     /* getter */
     public function getIdMarca()
     {
         return $this->idMarca;
     }
     public function getNombreMarca()
     {
         return $this->nombreMarca;
     }

 }

 //$obj = new Marca();
 //$obj->setNombreMarca("Este es el Nombre de la Marca");
 //echo $obj->getNombreMarca();



?>