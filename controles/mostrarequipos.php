<?php
include 'daoUpload.php';
         $lista = new subirArchivo();
        $lista->listarcatalogo('equipos',4,$_GET["valor1"],$_GET["page1"],$_GET["tipo1"],$_GET["estado1"]);
?>
