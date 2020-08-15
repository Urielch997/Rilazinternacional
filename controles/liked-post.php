<?php
include '../dao/daoBoletin.php';

if(isset($_POST['q']) && $_POST['q'] == 'insert'){
$coment = new daoBoletin();
$id = $_POST['id'];
$iduser = $_POST['iduser'];
$idPub = $_POST['idPub'];
$coment->liked($id,$iduser,$idPub);
}

if(isset($_POST['q']) && $_POST['q'] == 'select'){
    $coment = new daoBoletin();
    $idpost = $_POST['id'];
    $comentar = $_POST['coment'];
    echo $coment->loadlike($idpost,$comentar);
}
?>