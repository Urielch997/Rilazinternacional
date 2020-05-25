<?php

    include 'paginacion.php';
    include '../dao/Connection.php';
    $mostrar = new pagina();

    $tabla = "equipos";
    $num = $_GET['page1'];

    $mostrar->tabla($tabla,5,$num);
?>