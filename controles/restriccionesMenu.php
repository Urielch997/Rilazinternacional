<?php
include "../dao/Connection.php";
include "../dao/daoRestricciones.php";


if(isset($_POST['inst'])){
  $restric = new daoRestricciones();
  $seccion=$_POST['seccion'];
  $id=$_POST['id'];
  echo $restric->restricMenu($id,$seccion);
}
if(isset($_POST['sru']) && $_POST['sru']==2){
    $restric = new daoRestricciones();
      $id = $_POST ['id'];
      echo $restric->verResMenu($id);
}
?>
