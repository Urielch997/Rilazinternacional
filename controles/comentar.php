<?php
include "post_comentario.php";
if(isset($_POST['sql'])){

    $comentar = new Comentarios();
    $comentar->CargarComentarios($_POST["sql"]);

}else{
    if(isset($_POST['coment'])){
        $comentar = new Comentarios();
        $usuario = $_POST['iduser'];
        $idpub = $_POST['idpub'];
        $coment = $_POST['coment'];
        $comentar->comentar($usuario,$idpub,$coment);
    }else{
        echo "Error";
    }
 
}

?>