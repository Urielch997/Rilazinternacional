<?php
    require_once '../dao/daoSubirVideo.php';
    if(isset($_FILES['video']['name'])){
        $extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
        $permitido = array('mp4','webm','ogv');
        if(!in_array($extension,$permitido)){
            $msj = array('status' => 'error','msj' =>'Error formato no permitido');
        }else{
            $vid = $_FILES['video']['type'];
            $name = $_FILES['video']['name'];
            $dir = '../Views/video/';
            if(move_uploaded_file($_FILES['video']['tmp_name'],$dir.$name)){
                $msj = array('status' => 'ok','msj' => $name);
                $titulo = $_POST['titulo'];
                $descipcion = $_POST['descripcion'];
                $upload =new daoSubirVideo();
                $upload->subir($name,$dir.$name,$titulo,$descipcion);
            }else{
                $msj = array('status' => 'error','msj' =>'Error: no se pudo cargar el archivo');
            }
        }
    echo json_encode($msj,JSON_FORCE_OBJECT);
} 
?>