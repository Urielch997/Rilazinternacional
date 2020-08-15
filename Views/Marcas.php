
<?php
require_once '../controles/validar.php';
if(!class_exists('daoRestricciones')){
    include "../dao/daoRestricciones.php";
}
include "../controles/mostrarResMenu.php";

if(!in_array("3",$d)){
  echo "<script type='text/javascript'>
  alert('No tienes permiso para ver esta seccion.');
  if(window.history.length  == 0){
      location.href='../login.php';
  }else{
      location.href = window.history.back();
  }
  </script>";
}
include ("../Controllers/marcasControllers.php");
$obj = new marcasControllers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!--<link rel="icon" type="image/png" href="../assets/img/favicon.png">-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Publicaciones
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script>
        function cargar(Id,name){
        document.frm2.txtIdMarca.value=Id;
        document.frm2.txtNameMarca.value=name;
    }
  </script>
</head>
<body class="">
  <?php include "nav.php" ?>
    <div class="main-panel">

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="collapse navbar-collapse justify-content-end">
              <?php echo "<h5><small>Te encuentras en:</small> Gesti&oacute;n de Marcas </h5>";?>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">


              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="usuario.php">Perfil</a>
                  <a class="dropdown-item" href="Publicaciones.php">Publicaciones</a>
                  <div class="dropdown-divider"></div>
                  <form action="Controllers/acceso.php" method="POST">
                    <a class="dropdown-item" href="../Controllers/acceso.php?cerrar">Cerrar Session</a>
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-2">
              <button type='button'  class='btn btn-info ' data-toggle='modal' data-target='#Ingresar'>
                Ingresar Marca
              </button>
            </div>
          </div>
            <div class="row">
            <div id='i'  class="col-md-12">
            <?php $obj->mostrarMarcas(); ?>
            </div>
          </div>
            <!-- Modal Seleccionar formulario2 -->
            <div class="modal fade" id="Seleccionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Gestión de Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form  id="formulario2" name="frm2">
                    <div class="modal-body">

                            <input type="hidden" name="txtIdMarca" value="0" id="txtIdUserE" class="form-control">

                            <div class="row">
                                <div class="col-md-2">
                                        <label class="h5">Nombre:</label>
                                </div>
                                <br><br>
                                <div class="col-md-10">
                                        <input type="text" name="txtNameMarca" id="txtNombre" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                                <br><br>

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btnMod" id="btnEliminarM" class="btn btn-outline-danger ">Eliminar</button>
                        <button type="submit" name="btnEli"  id="btnModificarM" class="btn btn-outline-warning ">Modificar</button>
                    </div>
                </div>
                </div>
            </div>
            <!--fin del Modal-->
            <!-- Modal Insertar Marca formulario3 -->
            <dvi class="row">
              <div class="modal fade" id="Ingresar" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresar Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form  id="formulario3"  method="POST" name="frm3">
                    <div class="modal-body">

                            <input type="hidden" name="txtIdMarcaI" value="0" id="" class="form-control">

                            <div class="row">
                              <div class="col-md-2">
                                <label class="h5">Nombre:</label>
                        </div>
                        <br><br>
                        <div class="col-md-10">
                                        <input type="text" name="txtNameMarcaI" id="txtNameMarcaI" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                                <br><br>

                            </div>

                    </div>
                  </form>
                    <div class="modal-footer">
                      <button  name="btnIns" id="btnInsertarM" class="btn btn-outline-info ">Insertar</button>

                    </div>

                </div>
                </div>
            </dvi>
          </div>
          <!--fin del Modal-->

        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  Developer Team
                </a>
              </li>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
              <li>
                <a href="#">
                  Blog
                </a>
              </li>
              <li>
                <a href="#">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>

            </script>, made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">Rilaz</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script src="Js/acctionss.js"></script>
  <script src="Js/sweetAlert.js"></script>
</body>
</html>
