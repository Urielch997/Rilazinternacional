<?php
include "../Controllers/publicationController.php";
if(!class_exists('daoRestricciones')){
    include "../dao/daoRestricciones.php";
}
include "../controles/mostrarResMenu.php";

if(!in_array("1",$d)){
  echo "<script type='text/javascript'>
  alert('No tienes permiso para ver esta seccion.');
  if(window.history.length  == 0){
      location.href='../login.php';
  }else{
      location.href = window.history.back();
  }
  </script>";
}
session_start();
if(isset($_GET["idPublicacion"]))
{

    $obj = new daoPublicacion();
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!--<link rel="icon" type="image/png" href="../assets/img/favicon.png">-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $obj->getTitulo($_GET["idPublicacion"]);?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="CSS/publicacion.css" rel="stylesheet"/>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10">

      </div>
      <div class="col-md-2">
        <a href="Publicaciones.php">
          <button class="btn btn-info">Regresar</button>
        </a>
      </div>
    </div>
  </div>
<div class="container">
    <center>
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <h1><?php echo $obj->getTitulo($_GET["idPublicacion"]);?></h1>
      </div>
      <div class="col-md-4">

      </div>
    </div>
    <img class="img" src='../img/<?php echo $obj->getImgTitle($_GET['idPublicacion']); ?>' style="border-radius: 30px; padding: 5px;" />

  </center>
  <div class="row publicacion">
    <h4>
      <?php echo $obj->getContenido($_GET["idPublicacion"]); ?>
    </h4>
    <hr>
    <h4>
      <?php echo $obj->getContenido2($_GET["idPublicacion"]); ?>
    </h4>
  </div>



</div>


<footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
              <?php echo $obj->getFooter($_GET["idPublicacion"]); ?>
              </li>
              <li>
              <?php echo $obj->getFecha($_GET["idPublicacion"]); ?>
              </li>
              <li>

              </li>
              <li>


              </li>
            </ul>
          </nav>
          <div class="copyright float-right">

        </div>
      </footer>
</body>
</html>
<?php

}
else
{
    header("location:Publicaciones.php");
}
?>
