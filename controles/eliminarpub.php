<?php
    include '../dao/daoPublicacion.php';
    $borrar = new daoPublicacion();
    $id = $_POST['id'];
    $borrar->borrar($id);
?>