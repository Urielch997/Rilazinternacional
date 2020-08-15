<?php
include '../dao/daoBoletin.php';
 if(isset($_GET['idbol'])){
    $v = new daoBoletin();
 }else{
   header('Location: Publicaciones.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!--<link rel="icon" type="image/png" href="../assets/img/favicon.png">-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  <?php $v->getTitulo($_GET['idbol']);?>
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
  <link href="CSS/boletines.css" rel="stylesheet">
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="Js/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <meta charset="UTF-8"/>
</head>
<body>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
          <div class="col-md-12">
            <a href="Publicaciones.php" class="btn btn-info"><i class="material-icons">arrow_back</i></a>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12 text-center">
              <h2><?php $v->getTitulo($_GET['idbol']);?></h2>
          </div>
      </div>
    <div class="row">
        <div class="col-md-12 text-justify boletin">
            <?php $v->getBoletin($_GET['idbol']); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <form id="comentar">
          <div class="row">
            <div class="col-md-10">
              <textarea class="form-control" placeholder="Comentar" rows="3" name="coment" id="coment"></textarea>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary">Comentar</button>
            </div>
          </div>
          <input type="hidden" value="<?php echo $_GET['idbol'];?>" name="idbol" id="idbol">
          <input type="hidden" value="<?php echo $_SESSION["user"]["ID"];?>" name="iduser" id="iduser">
        </form>
        </div>
    </div>

    <div class="row">
      <div class="col-md-12" id="comentarios">


            <div class="card card-nav-tabs mt-2 float-left">
              <div class="card-header card-header-info d-flex justify-content-between">
                <span>Oscar Rodriguez</span><div class="d-flex justify-content-center align-items-center options"><span class="text-like">2</span><i class="material-icons thumb">thumb_up_alt</i><span class="text-like">5</span><i class="material-icons">reply</i></div>
              </div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                  <footer class="blockquote-footer"><cite title="Source Title">14/06/2020</cite></footer>
                </blockquote>
              </div>
            </div>

      </div>
    </div>

    </div>
  </div>
<footer class="footer">
        <div class="container-fluid">
        <div class="copyright float-right">
        </div>
      </footer>
      <script type="text/javascript" src="../js/boletines-coment.js"></script>
</body>
</html>
