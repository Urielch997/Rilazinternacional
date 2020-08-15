<?php
    require_once '../dao/daoConfig.php';
    session_start();


    class Comentarios{
        
        function comentar($usuario,$idpub,$coment){
            $key_temp = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
            $estado = 'INACTIVO';
            $tipo = 'publicaciones';
            $con = conexion();
            date_default_timezone_set('America/El_Salvador');
            $fecha = date("Y-m-d H:i:s");
            $sql = "INSERT INTO comentarios (comentario	,usuario,fecha,idPublicacion,seccion,repply,idrepply,estado,tmp_key) VALUES(:comentario, :usuario, :fecha, :idPublicacion, :seccion, :repply, :idrepply,:estado,:tmp)";
            $cmd = $con->prepare($sql);
            $cmd->execute(array(':comentario' => $coment, ':usuario' => $usuario, ':fecha' => $fecha, ':idPublicacion' => $idpub, ':seccion' => $tipo,':repply' => 0,':idrepply' => NULL,':estado' => $estado,':tmp' => $key_temp));
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

        function CargarComentarios($idpub){
            $con = conexion();
            $sql = "SELECT comentarios.*, usuarios.nombre FROM comentarios INNER JOIN usuarios ON usuarios.idusuario = comentarios.usuario WHERE comentarios.idPublicacion =".$idpub." AND comentarios.seccion='publicaciones' AND comentarios.estado NOT IN ('INACTIVO') ORDER BY comentarios.fecha DESC";
            $cmd = $con->prepare($sql);
            $cmd->execute();
            $div = '';
            while($r = $cmd->fetch(PDO::FETCH_ASSOC)){
            $div .='<div class="card card-nav-tabs mt-5">
                <h4 class="card-header card-header-info">'.$r['nombre'].'</h4>
                <div class="card-body">
                    <p class="card-text">'.$r['comentario'].'</p>
                </div>
                </div>';
            }
            echo $div;
        }
    }
    
?>