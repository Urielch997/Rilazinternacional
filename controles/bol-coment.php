<?php
include '../dao/daoBoletin.php';
if(isset($_POST['q']) && $_POST['q'] == 'i'){
    $bol = new daoBoletin();
    $coment = $_POST['coment'];
    $idbol = $_POST['idbol'];
    $iduser = $_POST['iduser'];
    $bol->insertComent($coment,$idbol,$iduser);
}

if(isset($_POST['q']) && $_POST['q'] == 'g'){
    $bol = new daoBoletin();
    $id = $_POST['id'];
    $bol->getComentarios($id);
}
?>