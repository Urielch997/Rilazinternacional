<?php

require "../dao/daoUsuarios.php";
class usuarioControllers extends daoUsuarios
{
}
$obj = new daoUsuarios();
$usu = new Usuarios();

if(isset($_REQUEST["updateProfileAdminIngreso"]))
{

    $usu->setNombreusuario($_REQUEST["txtnombre"]);
    $usu->setUsername($_REQUEST["txtusername"]);
    $usu->setPass($_REQUEST["txtpass"]);
    $usu->setDireccion($_REQUEST["txtdireccion"]);
    $usu->setNumTelefono($_REQUEST["txtnumtelefono"]);
    $usu->setCorreoElectronico($_REQUEST["txtcoreeo"]);
    $usu->setPerfil($_REQUEST["selPerfil"]);
    $obj->ingresar($usu);
    echo $obj->listUsuariosTable();

}


if(isset($_REQUEST["updateProfile"]))
{
   


    $usu->setIdUsuario($_REQUEST["txtidUPro"]);
    $usu->setNombreusuario($_REQUEST["txtnombre"]);
    $usu->setUsername($_REQUEST["txtusername"]);
    $usu->setPass($_REQUEST["txtpass"]);
    $usu->setDireccion($_REQUEST["txtdireccion"]);
    $usu->setNumTelefono($_REQUEST["txtnumtelefono"]);
    $usu->setCorreoElectronico($_REQUEST["txtcoreeo"]);
    $usu->setPerfil($_REQUEST["txtPerfilU"]);
    $obj->modificar($usu);
    echo $obj->listUsuariosMostrartext($usu->getIdUsuario());




}

if(isset($_REQUEST["updateProfileAdmin"]))
{

    $usu->setIdUsuario($_REQUEST["txtidUPro"]);
    $usu->setNombreusuario($_REQUEST["txtnombre"]);
    $usu->setUsername($_REQUEST["txtusername"]);
    $usu->setDireccion($_REQUEST["txtdireccion"]);
    $usu->setNumTelefono($_REQUEST["txtnumtelefono"]);
    $usu->setCorreoElectronico($_REQUEST["txtcoreeo"]);
    $usu->setPerfil($_REQUEST["selPerfil"]);
    $obj->modificarnoPass($usu);

    echo $obj->listUsuariosTable();
}



if(isset($_REQUEST["deleteProfileadmin"]))
{
    $usu->setIdUsuario($_REQUEST["txtidUPro"]);
    $obj->eliminarUsu($usu);

    echo $obj->listUsuariosTable();
}
if(isset($_REQUEST["btnACtivar"]))
{
    $usu->setIdUsuario($_REQUEST["txtidUPro"]);
    $obj->activarUsu($usu);
    echo $obj->listUsuariosTable();
}







;



?>
