<?php
include '../dao/daoBoletin.php';
    $buscar = new daoBoletin();
    $q=$_POST['q'];
    $pag = $_POST['pag'];
    $buscar->readBoletin($q,$pag);
?>