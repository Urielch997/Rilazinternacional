<?php
include '../controles/conexion.php';
session_start();
if(isset($_GET['q']) && ($_SESSION["user"]["Perfil"] == 1 || $_SESSION["user"]["Perfil"] == 4)){
    $key_tmp = $_GET['q'];
    $con = conexion();
    $stm = $con->prepare("SELECT * FROM comentarios WHERE tmp_key = :tmp");
    $stm->bindParam(':tmp',$key_tmp,PDO::PARAM_STR);
    $stm->execute();
    $count = $stm->rowCount();
    if($count>0){
        $r = $stm->fetch(PDO::FETCH_ASSOC);
        $tmp = $r['id'];
        $cmd = $con->prepare("UPDATE comentarios SET tmp_key = NULL, estado='ACTIVO' WHERE id=".$tmp);
        $cmd->execute();
        $title = 'Comenatrio aprobado';
        $content = 'El comentario a sido aprobado, sera mostrado en la seccion de comentarios.';
        $icon = '<span class="material-icons" style="color:#81c784;">check</span>';
    }else{
        $title='Este comentario ya ha sido procesado';
        $content = 'Este comentario ya ha sido procesado por otro usuario.';
        $icon = '<span class="material-icons" style="color:#2196f3;">info</span>';
    }
}else if(isset($_GET['no']) && ($_SESSION["user"]["Perfil"] == 1 || $_SESSION["user"]["Perfil"] == 4)){
        $key_tmp = $_GET['no'];
        $con = conexion();
        $stm = $con->prepare("SELECT * FROM comentarios WHERE tmp_key = :tmp");
        $stm->bindParam(':tmp',$key_tmp,PDO::PARAM_STR);
        $stm->execute();
        $count = $stm->rowCount();
        if($count>0){
            $r = $stm->fetch(PDO::FETCH_ASSOC);
            $tmp = $r['id'];
            $cmd = $con->prepare("DELETE FROM comentarios WHERE id=".$tmp);
            $cmd->execute();
            $title='El comentario se ha eliminado.';
            $content = 'El comentario se ha eliminado,se ha enviado una notificacion al usuario.';
            $icon = '<span class="material-icons" style="color:#e53935;">cancel</span>';
        }else{
            $title='Este comentario ya ha sido procesado';
            $content = 'Este comentario ya ha sido procesado por otro usuario.';
            $icon = '<span class="material-icons" style="color:#2196f3;">info</span>';
        }
    }else{
        $title='No se puede realizar la accion solicitada.';
        $content = 'No se puede realizar la accion, no tiene permisos de administrador.';
        $icon = '<span class="material-icons" style="color:#e53935;">cancel</span>';
    }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Confirmar comentario
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" href="CSS/font-awesome.min.css">
  <link rel="stylesheet" href="../css/iconsmaterial.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <script src="../assets/js/core/jquery.min.js"></script>
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="CSS/public.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="card-title d-flex"><?php echo $title.$icon;?></h4>
                    </div>
                    <div class="card-body">
                        <?php echo $content;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>