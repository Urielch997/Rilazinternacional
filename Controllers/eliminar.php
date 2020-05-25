<?php
    include "../dao/daoUpload.php";
    $eliminar = new subirArchivo();
    $id = $_GET['id1'];
    $tabla = $_GET['tabla1'];
    echo "hola";
    $eliminar->eliminar($id,$tabla);
?>