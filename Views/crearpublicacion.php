<?php
include "../dao/daoMarca.php";

session_start();
    $marc= new daoMarca();
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!--<link rel="icon" type="image/png" href="../assets/img/favicon.png">-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Crear publicacion</title>
  <script src="Js/jquery.js"></script>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="ckeditor/ckeditor.js"></script>
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <script src="ckeditor/config.js"></script>
  <link href="CSS/publicacion.css" rel="stylesheet"/>
</head>
<body load="setCKEditorToTextarea()">
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
  <form id="publicacion" method="POST" enctype="multipart/form-data" action="#">
  <div class="row">
    <div class="form-group col-md-6">
      <label>Titulo de la publicacion</label>
        <input type="text" class="form-control" name="titulo">
    </div>
    <div class="form-group col-md-6">
      <label>Tipo:</label>
        <select class="custom-select" name="tipo">
          <option value="1">Hardware</option>
          <option value="2">Software</option>
        </select>
    </div>
    <div class="form-group col-md-6">
      <label>Marca:</label>
        <select class="custom-select" name="marca">
          <?php
            $marc->getMarcaSelect();
          ?>
        </select>
    </div>

    <div class="form-group col-md-6">
      <label>Pie de vista previa de la publicacion</label>
        <input type="text" class="form-control" name="footer">
    </div>

    <div class="form-group col-md-12">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="imagen" name="imagen">
        <label class="custom-file-label" for="imagen">Seleccionar imagen para vista previa</label>
      </div>
    </div>

  </div>
  <div class="row">
  <div class="col-md-12">
    <textarea id="ckeditor" class="ckeditor" name="pb"></textarea>
  </div>
  </div>
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-md-12">
      <input class="btn btn-primary col-md-12" type="submit" value="publicar"/>
    </div>
  </div>
</form>
</div>
<div id="prueba"></div>
</div>
<footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">

        </div>
      </footer>
<script src="../js/nuevaPublicacion.js"></script>
</body>
</html>
