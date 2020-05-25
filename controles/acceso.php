<?php
session_start();
include "../dao/daoUsuarios.php";

$daousu = new daoUsuarios();
$usuario = $_POST['txtUsuario'];
$pass = $_POST['txtContra'];
return $daousu->acess($usuario,$pass);
?>
