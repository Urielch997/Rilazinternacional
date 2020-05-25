<?php
require "../dao/daoUpload.php";


class uploadequipos extends subirArchivo
{
}

        if(empty($_FILES['foto']['name'])){
                $msj = Array("Mensaje"=>"Error falta imagen de equipo.");
                echo json_encode($msj,JSON_FORCE_OBJECT);
        }elseif(empty($_POST['titulo'])){
                $msj = Array("Mensaje"=>"Falta titulo de articulo.");
                echo json_encode($msj,JSON_FORCE_OBJECT);
        }elseif(empty($_POST['tipoarticulo'])){
                $msj = Array("Mensaje"=>"Tipo de articulo vacio");
                echo json_encode($msj,JSON_FORCE_OBJECT);
        }elseif(empty($_POST['tipo'])){
               $msj = Array("Mensaje"=>"Tipo de equipo");
               echo json_encode($msj,JSON_FORCE_OBJECT);
        }else{

        $subir = new subirArchivo();
        $nombre = $_FILES['foto']["name"];
        $ruta = $_FILES['foto']['tmp_name'];
        $titulo = $_POST['titulo'];
        $tipoarticulo = $_POST['tipoarticulo'];
        $tipo=$_POST['tipo'];
        $marca=$_POST['marca'];

        $pdfr = $_FILES['pdf']['name'];
        $tmpname = $_FILES['pdf']['tmp_name'];


        if($marca=="Toshiba"){
                $uploadFileDir = '../Views/img/Toshiba/';
                $uploadFilePDF = '../Views/info/Toshiba/';
        }else{
               $uploadFileDir = '../Views/img/Lexmark/';
                $uploadFilePDF = '../Views/info/Lexmark/';
        }

        $dest_path = $uploadFileDir . $nombre;
        $dest_pdf = $uploadFilePDF . $pdfr;
        if(move_uploaded_file($ruta,$dest_path)){

                return $subir->subirArc($nombre,$pdfr,$titulo,$tipo,$marca);

            // echo "Se guardo la imagen del equipo correctamente.<br>";
        }else{
              //  echo "error";
                  return $subir->subirArc($nombre,$pdfr,$titulo,$tipo,$marca);
        }

        if(move_uploaded_file($tmpname,$dest_pdf)){
              //  echo "Se guardo el Brochure correctamente.";
        }else{
              //  echo "error";
        }

        }


?>
