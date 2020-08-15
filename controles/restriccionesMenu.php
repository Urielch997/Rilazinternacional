<?php
include "../dao/Connection.php";
include "../dao/daoRestricciones.php";


if(isset($_POST['inst']) && $_POST['inst'] == 1){
  $restric = new daoRestricciones();
  $seccion=$_POST['seccion'];
  $id=$_POST['id'];
  echo $restric->restricMenu($id,$seccion);
}
if(isset($_POST['sru']) && $_POST['sru']  ==2){
    $restric = new daoRestricciones();
      $id = $_POST['id'];
      echo $restric->verResMenu($id);
}
if(isset($_POST['sru']) && $_POST['sru'] ==3){
    $restric = new daoRestricciones();
    $id = $_POST['id'];
    echo $restric->verResMenuTipo($id);
}
if(isset($_POST['inst']) && $_POST['inst'] == 3){
    $restric = new daoRestricciones();
    $id = $_POST['id'];
    $seccion = $_POST['seccion'];
    echo $restric->porTipoMenu($id,$seccion);
}
?>
