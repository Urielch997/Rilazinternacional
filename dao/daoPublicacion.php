<?php
include "../controles/Connection.php";
include "../Models/publicacion.php";
class daoPublicacion
{


    public function listPublicacion($idPublicacion)
    {
        try{
            //instancia para conectar
            $conexion =conexion();
            $name = $conexion->prepare("SET NAMES 'utf8'");
            $name->execute();
            $consultaSQL = "SELECT publicacion.idPublicacion,publicacion.titulo,publicacion.contenido,publicacion.footer,publicacion.fecha ,tipocontenido.nombre as 'Tipo Contenido' ,marca.nombre as 'marca', ap.ruta
            from  publicacion
            inner join marca marca on marca.idMarca = publicacion.marca
            inner JOIN tipocontenido tipocontenido on tipocontenido.idTipoContenido = publicacion.tipocontenido
            inner JOIN  archivospublicados ap on ap.publicacion = publicacion.idPublicacion
            where ap.type='title' and publicacion.idPublicacion= ".$idPublicacion."; ";
            $resultadoRes = $conexion->prepare($consultaSQL);
            $resultadoRes->execute();
            $dataTable= null;
                while($fila = $resultadoRes->fetch(PDO::FETCH_ASSOC)){

                    $dataTable.=
                    "<div class='col-md-4 col-sm-6'>
                        <div class='card video' style='height: 99%;'>
                            <div class='card-title'>
                                    <img src='../img/".$fila['ruta']."' class='card-img-top img-title'  >
                            </div>
                            <div class='card-body'>
                                <h5 class='card-title'>".$fila['titulo']."</h5>
                            </div>
                            <div class='card-footer'>
                            <form action='../Views/viewPublication.php' method='GET'>
                            <button type='submit' name='idPublicacion' value='".$fila['idPublicacion']."' class='btn btn-primary'>Ir a Publicacion</button>
                            </form>
                                </div>
                        </div>
                    </div>";


                }
          return $dataTable;
        }catch(PDOExeption $error){
            return $error->getMessage();
        }
    }
    public function getTitulo($idPublicacion)
    {
        try{
            //instancia para conectar
            $conexion = conexion();
            $consultaSQL = "select publicacion.idPublicacion,publicacion.titulo,publicacion.contenido,publicacion.footer,publicacion.fecha ,tipocontenido.nombre as 'Tipo Contenido' ,marca.nombre as 'marca', ap.ruta
            from  publicacion
            inner join marca marca on marca.idMarca = publicacion.marca
            inner JOIN tipocontenido tipocontenido on tipocontenido.idTipoContenido = publicacion.tipocontenido
            inner JOIN  archivospublicados ap on ap.publicacion = publicacion.idPublicacion
            where ap.type='title' and publicacion.idPublicacion= ".$idPublicacion."; ";
            $resultadoRes = $conexion->prepare($consultaSQL);
            $resultadoRes->execute();
            $text= null;
                while($fila = $resultadoRes->fetch(PDO::FETCH_ASSOC)){
                    $text.=$fila['titulo'];
                }
          return $text;
        }catch(Exeption $error){

        }
    }
    public function getContenido($idPublicacion)
    {
        try{
            //instancia para conectar
            $conexion = conexion();
            $consultaSQL = "SELECT publicacion.idPublicacion,publicacion.titulo,publicacion.contenido,publicacion.footer,publicacion.fecha ,tipocontenido.nombre as 'Tipo Contenido' ,marca.nombre as 'marca', ap.ruta
            FROM  publicacion
            inner join marca marca on marca.idMarca = publicacion.marca
            inner JOIN tipocontenido tipocontenido on tipocontenido.idTipoContenido = publicacion.tipocontenido
            inner JOIN  archivospublicados ap on ap.publicacion = publicacion.idPublicacion
            where ap.type='title' and publicacion.idPublicacion= ".$idPublicacion."; ";
            $resultadoRes = $conexion->prepare($consultaSQL);
            $resultadoRes->execute();
            $text= null;
                while($fila = $resultadoRes->fetch(PDO::FETCH_ASSOC)){
                    $text.=$fila['contenido'];
                }
          return $text;
        }catch(Exeption $error){

        }
    }

    public function getFooter($idPublicacion)
    {
        try{
            //instancia para conectar
            $conexion =conexion();
            $consultaSQL = "select publicacion.idPublicacion,publicacion.titulo,publicacion.contenido,publicacion.footer,publicacion.fecha ,tipocontenido.nombre as 'Tipo Contenido' ,marca.nombre as 'marca', ap.ruta
            from  publicacion
            inner join marca marca on marca.idMarca = publicacion.marca
            inner JOIN tipocontenido tipocontenido on tipocontenido.idTipoContenido = publicacion.tipocontenido
            inner JOIN  archivospublicados ap on ap.publicacion = publicacion.idPublicacion
            where ap.type='title' and publicacion.idPublicacion= ".$idPublicacion."; ";
            $resultadoRes = $conexion->prepare($consultaSQL);
            $resultadoRes->execute();
            $text= null;
                while($fila = $resultadoRes->fetch(PDO::FETCH_ASSOC)){
                    $text.=$fila['footer'];
                }
          return $text;
        }catch(Exeption $error){

        }
    }
    public function getFecha($idPublicacion)
    {
        try{
            //instancia para conectar
            $conexion=conexion();
            $consultaSQL = "select publicacion.idPublicacion,publicacion.titulo,publicacion.contenido,publicacion.footer,publicacion.fecha ,tipocontenido.nombre as 'Tipo Contenido' ,marca.nombre as 'marca', ap.ruta
            from  publicacion
            inner join marca marca on marca.idMarca = publicacion.marca
            inner JOIN tipocontenido tipocontenido on tipocontenido.idTipoContenido = publicacion.tipocontenido
            inner JOIN  archivospublicados ap on ap.publicacion = publicacion.idPublicacion
            where ap.type='title' and publicacion.idPublicacion= ".$idPublicacion."; ";
            $resultadoRes = $conexion->prepare($consultaSQL);
            $resultadoRes->execute();
            $text= null;
                while($fila = $resultadoRes->fetch(PDO::FETCH_ASSOC)){
                    $text.=date("Y/m/d",strtotime($fila['fecha']));
                }
          return $text;
        }catch(Exeption $error){

        }
    }
    public function getImgTitle($idPublicacion)
    {
        try{
            //instancia para conectar
            $conexion =conexion();
            $consultaSQL = "select publicacion.idPublicacion,publicacion.titulo,publicacion.contenido,publicacion.footer,publicacion.fecha ,tipocontenido.nombre as 'Tipo Contenido' ,marca.nombre as 'marca', ap.ruta
            from  publicacion
            inner join marca marca on marca.idMarca = publicacion.marca
            inner JOIN tipocontenido tipocontenido on tipocontenido.idTipoContenido = publicacion.tipocontenido
            inner JOIN  archivospublicados ap on ap.publicacion = publicacion.idPublicacion
            where ap.type='title' and publicacion.idPublicacion= ".$idPublicacion."; ";
            $resultadoRes = $conexion->prepare($consultaSQL);
            $resultadoRes->execute();
            $text= null;
                while($fila = $resultadoRes->fetch(PDO::FETCH_ASSOC)){
                    $text.=$fila['ruta'];
                }
          return $text;
        }catch(Exeption $error){

        }
    }

    public function newPost($titulo,$tipo,$marca,$pb,$footer,$ruta){
      try{
        $cn=conexion();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $fecha =Date("Y-m-d");
        $stm = $cn->prepare("INSERT INTO publicacion(tipocontenido,marca,titulo,footer,fecha,contenido) VALUES(:tipcont,:marca,:titulo,:footer,:fecha,:contenido)");
        $stm->bindParam(':tipcont',$tipo);
        $stm->bindParam(':marca',$marca);
        $stm->bindParam(':titulo',$titulo);
        $stm->bindParam(':footer',$footer);
        $stm->bindParam(':fecha',$fecha);
        $stm->bindParam(':contenido',$pb);
        if($stm->execute()){
            $id = $cn->lastInsertId();
            $type = "title";
            $cmd=$cn->prepare("INSERT INTO archivospublicados(publicacion,ruta,type) VALUES(:id,:ruta,:type)");
            $cmd->bindParam(':id',$id);
            $cmd->bindParam(':ruta',$ruta);
            $cmd->bindParam(':type',$type);
            $cmd->execute();
          echo $id;
        }else{
          echo "Error ". $stm->errorInfo();
        }
      }catch(PDOException $e){
        echo $e->getMessage();
      }
    }

    public function borrar($id){
        $con = conexion();
        $stm = $con->prepare("DELETE FROM archivospublicados WHERE publicacion=".$id."; DELETE FROM publicaciones WHERE idPublicacion =".$id);
        $stm->execute();
    }


}
