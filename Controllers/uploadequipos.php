<?php
require "../dao/daoUpload.php";


class uploadequipos extends subirArchivo
{
}
        if(empty($_FILES['foto']['name'])){
                echo "Error falta imagen de equipo.";
        }elseif(empty($_FILES['pdf']['name'])){
                echo "Error falta PDF de equipo.";
        }elseif(empty($_POST['titulo'])){
                echo "Falta titulo de articulo.";
        }elseif(empty($_POST['tipoarticulo'])){
                echo "Tipo de articulo vacio";
        }elseif(empty($_POST['tipo'])){
               echo "Tipo de equipo"; 
        }else{

        $subir = new subirArchivo();
        $nombre = $_FILES['foto']["name"];
        $ruta = $_FILES['foto']['tmp_name'];
        $uploadFileDir = '../Views/img/Toshiba/';
        $dest_path = $uploadFileDir . $nombre;

        $titulo = $_POST['titulo'];
        $tipoarticulo = $_POST['tipoarticulo'];
        $tipo=$_POST['tipo'];
        $marca=$_POST['marca'];

        $pdfr = $_FILES['pdf']['name'];
        $tmpname = $_FILES['pdf']['tmp_name'];
        $uploadFilePDF = '../Views/info/Toshiba/';
        $dest_pdf = $uploadFilePDF . $pdfr;
        if(move_uploaded_file($ruta,$dest_path)){
              $subir->subirArc($nombre,$pdfr,"","",""); 
              echo "Guardado Correctamente";     
        }else{
                echo "error";
        }

        if(move_uploaded_file($tmpname,$dest_pdf)){
                move_uploaded_file($tmpname,$dest_pdf);   
        }else{
                echo "error";
        }
        
        }


?>