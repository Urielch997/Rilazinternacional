<?php
    require_once '../dao/daoBoletin.php';

    $loadres = new daoBoletin();

    $id = $_POST['id'];

    $loadres->loadRespon($id);

?>