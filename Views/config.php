<?php
session_start();
if(!class_exists('daoRestricciones')){
    include "../dao/daoRestricciones.php";
}
include "../controles/mostrarResMenu.php";

if(!in_array("0",$d)){
  echo "<script type='text/javascript'>
  if( window.history.length == 1 && document.referrer || window.history == null){
      location.href='../login.php';
  }else{
      location.href = window.history.back();
  }
  </script>";
}
include "../dao/daoMarca.php";
    $marc= new daoMarca();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Configuracion</title>
  <script src="Js/jquery.js"></script>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="../assets/js/plugins/sweetalert2.js"></script>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <a href="Publicaciones.php">
          <button class="btn btn-info"><span class="material-icons">
arrow_back
</span></button>
        </a>
      </div>
    </div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <h3 class="text-center">Comentarios</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
    Correos:
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="correo">Correos</label>
            <textarea class="form-control" id="correo" rows="3"></textarea>
        </div>
    </div>
    <div class="col-md-3">
        <button class="btn btn-primary" id='saveEmail'>Guardar</button>
    </div>
    <div id="result">

    </div>
  </div>
</div>
<footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">

        </div>
      </footer>
<script src="../js/config.js"></script>
</body>
</html>
