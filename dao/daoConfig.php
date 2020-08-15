<?php
require_once '../controles/Connection.php';

class daoConfig{

    function setEmail($correo){
        $con = conexion();
        $stm = $con->prepare('SELECT correo FROM config');
        $stm->execute();
        $r = $stm->fetch(PDO::FETCH_ASSOC);
        if($r['correo'] == NULL){
            $cmd = $con->prepare("INSERT INTO config(correo) VALUES(:correo)");
            $cmd->bindParam(':correo',$correo,PDO::PARAM_STR);
            $cmd->execute();
        }else {
            $cmd = $con->prepare("UPDATE config SET correo = :correo WHERE id = 1");
            $cmd->bindParam(':correo',$correo,PDO::PARAM_STR);
            $cmd->execute();
        }
    }

    function getEmail(){
        $con = conexion();
        $stm = $con->prepare('SELECT correo FROM config');
        $stm->execute();
        $r = $stm->fetch(PDO::FETCH_ASSOC);
        return $r['correo'];
    }
}
?>