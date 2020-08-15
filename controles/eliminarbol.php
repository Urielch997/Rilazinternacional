<?php
include '../dao/daoBoletin.php';
$eliminar = new daoBoletin();
$id = $_POST['id'];
$eliminar->delbol($id);
?>