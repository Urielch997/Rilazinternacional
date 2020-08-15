<?php
    require_once '../dao/daoBoletin.php';
    $boletin = new daoBoletin();
    $bol = $_POST['bol'];
    $titulo =$_POST['titulo'];

    echo $boletin->postBol($bol,$titulo);
?>