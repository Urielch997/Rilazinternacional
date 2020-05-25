<?php
    require_once("../dao/daoPublicacion.php");


    $pub = new daoPublicacion();
    $titulo = $_POST["titulo"];
    $tipo = $_POST["tipo"];
    $marca = $_POST["marca"];
    $pb = $_POST["pb"];
    $footer = $_POST["footer"];
    $tmp = $_FILES['imagen']['tmp_name'];
    $nombre = $_FILES['imagen']['name'];
    $ruta = "../img/".$nombre;
    move_uploaded_file($tmp,$ruta);
  return $pub->newPost($titulo,$tipo,$marca,$pb,$footer,$nombre);
?>
