<?php
    require_once '../controles/conexion.php';

    class daoSubirVideo{

        function subir($nombre,$dir,$titulo,$descripcion){
            $fecha = date("Y-m-d H:i:s");
            $con = conexion();
            $stm = $con->prepare('INSERT INTO videos(carpeta,nombre,titulo,descripcion,fecha_post) VALUES(:carpeta,:nombre,:titulo,:descripcion,:fecha_post)');
            $stm->bindParam(':carpeta',$dir);
            $stm->bindParam(':nombre',$nombre);
            $stm->bindParam(':titulo',$titulo);
            $stm->bindParam(':descripcion',$descripcion);
            $stm->bindParam(':fecha_post',$fecha);
            $stm->execute();
        }

        function ListVideos(){
            $con = conexion();
            $stm = $con->prepare('SELECT * FROM videos');
            $stm->execute();
            $count = $stm->rowCount();

            if($count>0){
                $div = '';
                    while($r = $stm->fetch(PDO::FETCH_ASSOC)){
                        $div .= '<div class="col-md-4">
                        <div class="card mb-3 py-1">
                            <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="'.$r['carpeta'].'" allowfullscreen></iframe>
                            </div>
                        <div class="card-body">
                            <h4 class="card-title">'.$r['titulo'].'</h4>
                            <p class="card-text">'.$r['descripcion'].'</p>
                            
                            <div class="d-flex justify-content-between">
                            <p class="card-text"><small class="text-muted">'.date('d/M/y',strtotime($r['fecha_post'])).'</small></p>
                            <a class="text-danger" href="#" onClick="eliminarVid('.$r['id'].')">Eliminar</a>
                            </div>
                        </div>
                        </div>
                    </div>';
                }
            }else{
                $div = '<div class="card">
                        <div class="card-body d-flex justify-content-center align-items-center flex-wrap">
                            <span class="material-icons col-md-12 text-center alerta">
                                info
                            </span>
                            <label class="col-md-12 text-center mt-2">
                                Ningun video ha sido subido.
                            </label>
                        </div>
                    </div>';
            }
            echo $div;
        }

        function del($id){
           $con = conexion();
           $cmd = $con->prepare('SELECT nombre FROM videos WHERE id='.$id);
           $cmd->execute();
           $r = $cmd->fetch(PDO::FETCH_ASSOC);
            $nombre = $r['nombre'];
            $stm = $con->prepare('DELETE FROM videos WHERE id='.$id);
            unlink('./../Views/video/'.$nombre);
            $stm->execute();
        }

    }
?>