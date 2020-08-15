<?php
    require_once '../dao/daoSubirVideo.php';
    $delete = new daoSubirVideo();
    $id = $_POST['id'];
    $delete->del($id);
?>