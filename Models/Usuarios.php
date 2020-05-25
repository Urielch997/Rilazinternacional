<?php
 include "Perfil.php";
class Usuarios extends Perfil
{

    private $idUsuario;
    private $nombre;
    private $perfil ;
    private $correoElectronico;
    private $numTelefono;
    private $username;
    private $pass;
    private $direccion;
 
    public function __construct()
    {
        
    }

    /*funciones que asignan valor a las variables
    de la clase Usuarios.*/
    public function setIdUsuario($var)
    {
        $this->idUsuario=$var;
    }
    public function setNombreusuario($var)
    {
        $this->nombre=$var;
    }
    public function setCorreoElectronico($var)
    {
        $this->correoElectronico=$var;
    }
    
    public function setNumTelefono($var)
    {
        $this->numTelefono = $var;
    }
    public function setUsername($var)
    {
        $this->username=$var;
    }
    public function setPass($var)
    {
        $this->pass=$var;
    }
    public function setDireccion($var)
    {
        $this->direccion=$var;
    }
    public function setPerfil($var)
    {
        $this->perfil=$var;
    }

    /*Funciones que devuelven el valor de las variables
    de la Classe Usuarios*/

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function getNombreusuario()
    {
        return $this->nombre;
    }
    public function getperfil()
    {
        return $this->perfil;
    }
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }
    public function getNumTelefono()
    {
        return $this->numTelefono;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }



 
}

//$objPersona->setNombre("Administrador");
//$objPersona->setNombreusuario("<h1>Este es el nombre del Perfil: ".$objPersona->getnombre()."</h1>");
//echo $objPersona->getnombreusuario() ;


?>