<?php
session_start();
include "../dao/daoUsuarios.php";
if(isset($_REQUEST["btnIngresar"])){
    $username = $_REQUEST["txtUsuario"];
    $contra = $_REQUEST["txtContra"];
    $nombre = "";
    $Perfil = "";
    try{
        $daousu = new daoUsuarios();
        if($daousu->acess($username,$contra))
        {
            header("location:../views/Publicaciones.php");
        }else{
            header("location:../login.php?fail");
        }
    }catch(Exeption $error){
    }
}else{
    if(isset($_REQUEST["cerrar"])){
        session_destroy();
        header("location:../login.php");
    }
    else
    {
        header("location:../login.php?fail");  
    }
}
?>