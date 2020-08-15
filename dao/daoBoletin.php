<?php
include '../controles/Connection.php';
include 'daoConfig.php';
session_start();
class daoBoletin{
    public function readBoletin($q,$pag){
        $paginas_can = 3;
        $con =conexion();
        if($q != ""){
            $list = $con->prepare("SELECT * FROM boletines WHERE titulo LIKE '%".$q."%' OR boletin LIKE '%".$q."%'");
            /*$stm = $con->prepare("SELECT * FROM boletines WHERE MATCH (titulo) AGAINST ('".$q."' IN BOOLEAN MODE)");*/
        }else{
            $list = $con->prepare("SELECT * FROM boletines");
        }

        $list->execute();
        $total_pag = $list->rowCount();

        $page = false;
        if (isset($pag)) {
            $page = $pag;
        }
        if (!$page) {
            $start = 0;
            $page = 1;
        } else {
            $start = ($page - 1) * $paginas_can;
        }

        $paginas = $total_pag/ $paginas_can;

        if($q != ""){
            $stm = $con->prepare("SELECT * FROM boletines WHERE titulo LIKE '%".$q."%' OR boletin LIKE '%".$q."%' LIMIT ".$start.",".$paginas_can);
        }else{
            $stm = $con->prepare("SELECT * FROM boletines LIMIT ".$start.",".$paginas_can);
        }
               
        $stm->execute();
        $count = $stm->rowCount();
        
        $canPag = ceil($paginas);
        $paginate_max = 3;

        $paginacion = '<nav aria-label="Page navigation example">
        <ul class="pagination">';

        if($total_pag> 1){
            if($pag != 1){
                $query = "'".$q."',".($pag - 1);
                $paginacion .= '<li class="page-item"><a class="page-link" href="#" onclick="load('.$query.')"><span class="material-icons">
                navigate_before
                </span></a></li>';
            }
            $pmin = ($pag>$paginate_max) ? ($pag-$paginate_max) : 1;
            $pmax = ($pag<($canPag-$paginate_max)) ? ($pag+$paginate_max) : $canPag;
            for($i = $pmin; $i<=$pmax; $i++){
                $query = "'".$q."',".$i; 
                if($pag == $i){
                    $paginacion .= '<li class="page-item active"><a class="page-link" href="#">'.$pag.'</a></li>';
                }else{
                    $paginacion .= '<li class="page-item"><a class="page-link" href="#" onclick="load('.$query.')">'.$i.'</a></li>';
                }
            }
            if($pag != $canPag){
                $query = "'".$q."',".($pag + 1);
                $paginacion .= '<li class="page-item"><a class="page-link" href="#" onclick="load('.$query.')"><span class="material-icons">
                navigate_next
                </span></a></li>';
            }
        }
        $paginacion .= '  </ul></nav>';
    

        $div = "";
            while($r = $stm->fetch(PDO::FETCH_ASSOC)){
                if($_SESSION['user']['Perfil'] == "4"){
                    $deleteInf = $r['id'].',"'.$q.'",'.$pag;
                    $del = "<a href=# class='text-danger' onclick='delbol(".$deleteInf.")'>Eliminar</a>";
                }else{
                    $del = "";
                }
                if(strlen($r['boletin'])>300){
                    $texto = '<p>'.substr($r['boletin'],0,300).'...</p> <a href="viewBoletin.php?idbol='.$r['id'].'" class="stretched-link">ver boletin</a>';
                }else{
                    $texto = '<p>'.$r['boletin'].'</p><a href="viewBoletin.php?idbol='.$r['id'].'" class="stretched-link">ver boletin</a>';
                }
                $div .= '<div class="row no-gutters bg-light position-relative col-md-12 mt-5" id="content">
                <div class="col-md-6 mb-md-0 p-md-4 box">
                      <img src="../img/idea.png" class="img-bol" alt="...">
                </div>
                <div class="col-md-6 position-static p-4 pl-md-0">
                      <h5 class="mt-0">'.$r['titulo'].'</h5>
                      '.$texto.'
                </div>
                '.$del.'
              </div>';
            }


        echo $div;
        echo $paginacion;
    } 

    function getTitulo($id){
        $con=conexion();
        $stm = $con->prepare('SELECT titulo FROM boletines WHERE id=:id');
        $stm->bindParam(':id',$id,PDO::PARAM_INT);
        $stm->execute();
        $r = $stm->fetch(PDO::FETCH_ASSOC);
        echo $r['titulo'];
    }

    function getBoletin($id){
        $con=conexion();
        $stm = $con->prepare('SELECT boletin FROM boletines WHERE id=:id');
        $stm->bindParam(':id',$id,PDO::PARAM_INT);
        $stm->execute();
        $r = $stm->fetch(PDO::FETCH_ASSOC);
        echo $r['boletin'];
    }

    function getComentarios($id){
        $con=conexion();
        $stm = $con->prepare("SELECT comentarios.*, usuarios.nombre FROM comentarios INNER JOIN usuarios ON usuarios.idusuario = comentarios.usuario WHERE comentarios.idPublicacion =".$id." AND comentarios.seccion='boletin'  AND comentarios.estado NOT IN ('INACTIVO') ORDER BY comentarios.fecha DESC");
        $stm->bindParam(':id',$id,PDO::PARAM_INT);
        $stm->execute();
        $count = $stm->rowCount();
        $div ="";
        if($stm){
            while($r = $stm->fetch(PDO::FETCH_ASSOC)){
              $coment = $this->loadLike($r['idPublicacion'],$r['id'],$r['usuario']);
              if($_SESSION['user']['ID'] == $r['usuario']){
                    $delete = '<i class="material-icons">delete_forever</i>';
              }else{
                  $delete = '';
              }
                if($coment == 0){
                    $coment = '';
                }
                if($r['repply'] == 0){
                        $div .= '<div id="content-coment"><div class="card card-nav-tabs float-left">
                        <div class="card-header card-header-info d-flex justify-content-between">
                        <span>'.$r['nombre'].'</span><div class="d-flex justify-content-center align-items-center options"><span class="text-like" id="'.$r['id'].'" >'.$coment.'</span><i class="material-icons thumb" id="'.$r['id'].'" data-toggle="tooltip" data-placement="top" title="Me gusta.">thumb_up_alt</i><i class="material-icons reply" data-toggle="tooltip" data-placement="top" title="Responder" id="reply">reply</i>'.$delete.'</div>
                        </div>
                        <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>'.$r['comentario'].'</p>
                            <footer class="blockquote-footer d-flex justify-content-between"><cite title="Source Title">'.date("d/M/Y",strtotime($r['fecha'])).'</cite><a href="#" onclick="ver('.$r['id'].')"><i class="material-icons down">arrow_drop_down</i>Ver mas</a></footer>
                           
                            </blockquote>
                        </div>
                    </div>
                    <div class="repply float-right mt-2 ress">
                        <input type="text" class="form-control"><button class="btn btn-primary">Comentar</button>
                    </div>
                    <div id="respon"></div></div>
                    ';
                }
           }
        }else{
            $div .= "Error";
        }

       echo $div;
    }

    function insertComent($coment,$idbol,$iduser){
        $fecha = date("Y-m-d H:i:s");
        $tipo = 'boletin';
        $repply = 0;
        $key_temp = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
        $con=conexion();
        $stm = $con->prepare("INSERT INTO comentarios(comentario,usuario,fecha,idPublicacion,seccion,tmp_key) VALUES(:coment,:usuario,:fecha,:idPublicacion,:seccion,:tmp)");
        $stm->bindParam(':coment',$coment);
        $stm->bindParam(':usuario',$iduser);
        $stm->bindParam(':fecha',$fecha);
        $stm->bindParam(':idPublicacion',$idbol);
        $stm->bindParam(':seccion',$tipo);
        $stm->bindParam(':tmp',$key_temp);
        $stm->execute(); 
            ini_set("SMTP","server1.rilaz.com.sv");
            $correos = new daoConfig();
            $to = $correos->getEmail();
            $subject = "Comentario";
            $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Demystifying Email Design</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            </head>
            <body style="margin: 0; padding: 0;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">	
                    <tr>
                        <td style="padding: 10px 0 30px 0;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                <tr>
                                    <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                        Rilaz Internacional
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
                                                    <b>Usario: '.$_SESSION['user']['nombre'].'</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                    Comentario: 
                                                    
                                                    <p style="font-style: italic;">"'.$coment.'"</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;"">
                                                    En: '.$tipo.'
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td width="260" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td>
                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td bgcolor="#00796b" style="text-align:center; padding: 25px 0 0 0; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                                        <a href="http://localhost/rilazinternacional/Views/confirm.php?q='.$key_temp.'" style="color:#fff; text-decoration: none;"><label style="color:#ffffff; padding:20px;">Autorizar</label></a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="font-size: 0; line-height: 0;" width="20">
                                                                &nbsp;
                                                            </td>
                                                            <td width="260" valign="top">
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td>
                                                                        
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td bgcolor="#f44336" style="text-align:center; padding: 25px 0 0 0; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                                                        <a href="http://localhost/rilazinternacional/Views/confirm.php?no='.$key_temp.'" style="color:#fff; text-decoration: none;"><label style="color:#ffffff; padding: 20px;">Rechazar</label></a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">
                                                    &reg; Rilaz Internacional 2020<br/>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
            </html>';
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= 'From: rilazinternacional@rilaz.com';
            mail($to, $subject, $message, $headers);
    }

    function liked($id,$iduser,$idPub){
        $con=conexion();
        $stm = $con->prepare("SELECT * FROM likes WHERE iduser =:id AND idcoment=:coment");
        $stm->bindParam(':id',$iduser,PDO::PARAM_INT);
        $stm->bindParam(':coment',$id,PDO::PARAM_INT);
        $stm->execute();
        $count = $stm->rowCount();
        if($count>0){
            $stm = $con->prepare("DELETE FROM likes WHERE iduser =".$iduser." AND idcoment=".$id);
            $stm->execute();
        }else{
            $stm = $con->prepare("INSERT INTO likes(idcoment,iduser,idpost) VALUES(:idcoment,:iduser,:idpost)");
            $stm->bindParam(':idcoment',$id,PDO::PARAM_INT);
            $stm->bindParam(':iduser',$iduser,PDO::PARAM_INT);
            $stm->bindParam(':idpost',$idPub,PDO::PARAM_INT);
            $stm->execute();
        }
    }

    function loadLike($idPub,$coment){
        $con=conexion();
        $stm = $con->prepare("SELECT COUNT(*) AS cantidad FROM likes WHERE idpost =:id AND idcoment=:coment");
        $stm->bindParam(':id',$idPub,PDO::PARAM_INT);
        $stm->bindParam(':coment',$coment,PDO::PARAM_INT);
        $stm->execute();
        $r = $stm->fetch(PDO::FETCH_ASSOC);
        return $r['cantidad'];
    }

    function postBol($boletin,$titulo){
        $con=conexion();
        $fecha = date("Y-m-d H:i:s");
        $stm = $con->prepare("INSERT INTO boletines(boletin,fecha,titulo) VALUES(:boletin,:fecha,:titulo)");
        $stm->bindParam(':boletin',$boletin,PDO::PARAM_STR);
        $stm->bindParam(':fecha',$fecha,PDO::PARAM_STR);
        $stm->bindParam(':titulo',$titulo,PDO::PARAM_STR);
        $stm->execute();
        return $con->lastInsertId();
    }

    function loadRespon($idreply){
        $con = conexion();
        $stm = $con->prepare("SELECT comentarios.*, usuarios.nombre FROM comentarios INNER JOIN usuarios ON usuarios.idusuario = comentarios.usuario WHERE comentarios.idrepply =".$idreply." AND comentarios.seccion='boletin' ORDER BY comentarios.fecha DESC");
        $stm->execute();
        $div = "";
        while($r = $stm->fetch(PDO::FETCH_ASSOC)){
            $coment = $this->loadLike($r['idPublicacion'],$r['id'],$r['usuario']);
            if($_SESSION['user']['ID'] == $r['usuario']){
                  $delete = '<i class="material-icons">delete_forever</i>';
            }else{
                $delete = '';
            }
              if($coment == 0){
                  $coment = '';
              }
            $div .= '<div class="card card-nav-tabs repply float-right mt-5 respuesta">
            <div class="card-header card-header-success d-flex justify-content-between align-items-center">
              <span>'.$r['nombre'].'</span><div class="d-flex justify-content-center align-items-center options"><span class="text-like" id="'.$r['id'].'">'.$coment.'</span><i class="material-icons thumb" id="'.$r['id'].'" data-toggle="tooltip" data-placement="top" title="Me gusta.">thumb_up_alt</i>'.$delete.'</div>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>'.$r['comentario'].'</p>
                <footer class="blockquote-footer"><cite title="Source Title">14/06/2020</cite></footer>
              </blockquote>
            </div>
          </div>';
        }

        echo $div;
    }

    function delbol($id){
        $con = conexion();
        $stm = $con->prepare('DELETE FROM boletines WHERE id='.$id);
        $stm->execute();
    }
}
?>