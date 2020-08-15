<?php
    include '../dao/daoConfig.php';
    $config = new daoConfig();
    if($_POST['q'] == 'i'){
        $correo = $_POST['correo'];
        $config->setEmail($correo);
    }else if($_POST['q'] == 'g'){
        echo $config->getEmail();
    }

?>  