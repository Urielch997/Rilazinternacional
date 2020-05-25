<?php
  require_once "../dao/daoUpload.php";

  $delvar = new subirArchivo();

  $delvar->eliminar($_POST["ids"],"equipos","var");
?>
