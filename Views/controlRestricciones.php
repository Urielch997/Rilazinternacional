
<?php
require_once '../controles/validar.php';
require "../Controllers/restriccioonesController.php";
if(!class_exists('daoRestricciones')){
    include "../dao/daoRestricciones.php";
}
include "../controles/mostrarResMenu.php";

if(!in_array("2",$d)){
  echo "<script type='text/javascript'>
  alert('No tienes permiso para ver esta seccion.');
  if(window.history.length  == 0){
      location.href='../login.php';
  }else{
      location.href = window.history.back();
  }
  </script>";
}
include "../dao/daoUsuarios.php";
$obj = new restriccioonesController();
$obj = new daoRestricciones();
$user = new daoUsuarios();
$_SESSION["user"]["Perfil"] = $obj->actualizarSession($_SESSION["user"]["ID"]);
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
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="Js/acctionss.js"></script>
  <script src="Js/sweetAlert.js"></script>
</head>
<body class="">
  <?php include "nav.php"; ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="collapse navbar-collapse justify-content-end">
            <?php echo "<h5><small>Te encuentras en:</small> Gesti&oacute;n de Restricciones </h5>";?>
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

      <?php
       /* function cargar(Id,name,cargo,edad,direccion){
			document.frm2.txtIdUserE.value=Id;
			document.frm2.txtNombre.value=name;
			document.frm2.txtCargo.value=cargo;
			document.frm2.txtEdad.value=edad;
      document.frm2.txtDireccion.value=direccion;
        } */
         ?>
      <div class="content">

        <div class="container-fluid">
          <div class="row justify-content-center">
              <label class="h1">Publicaciones</label>
          </div>
          <div class="col-md-12">
            <button id="btnShowIng" class="btn btn-info">Ingresar</button>
          <button id="btnShow" class="btn btn-info">Ver</button>
        </div>
          <div id="ingresar">
            <form  id="formulario1" name="frm"  method="POST">
                <input type="hidden" name="txtIdUser" value="0" id="txtIdUser" class="form-control">
                <div class="row">

                    <div class="col-md-1">
                            <label class="h5">Perfil:</label>
                    </div>
                    <div class="col-md-3">
                    <?php echo $obj->listarPerfil();?>
                    </div>
                    <div class="col-md-8"></div>
                </div>
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-1">
                            <label class="h5">Marca:</label>
                    </div>
                    <div id="marcas" class="col-md-3">
                      <?php echo $obj->listarMarcas(1);?>
                    </div>
                    <div class="col-md-2 ">
                            <label class="h5">Tipo de Contenido:</label>
                    </div>
                    <div id="TiCon" class="col-md-2">
                      <?php echo $obj->listarTipocontenido(1);?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-5 col-ms-5"></div><!--alert-info  esto va en la clase-->
                    <div class="col-md-2 col-ms-2">
                      <center>
                      <input type="button" name="btnEnviar" id="btnEnviar" value="Enviar!" class=" btn btn-outline-info ">
                      </center>
                    </div>
                    <div class="col-md-5 col-ms-5"></div><!--alert-info  esto va en la clase-->
                </div>
            </form>
      </div>


        <div id="ver">
          <div id="salida" class="row"></div>
          <div id="mostrar" class="row"></div>
        </div>
<hr class="style13">
        <div class="row justify-content-center">
            <label class="h1">Menu</label>
        </div>
        <div class="row">
          <div class="col-md-6">
          <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="porusuario" name="defaultExampleRadios" checked="checked">
              <label class="custom-control-label" for="porusuario">Por usuario</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="portipo" name="defaultExampleRadios">
              <label class="custom-control-label" for="portipo">Por tipo</label>
          </div>
        </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="h5 align-middle">Usuario</label>
              <select class="custom-select" id="usuario">
                  <?php
                    $user->seletListuser();
                  ?>
              </select>
            </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="h5 align-middle">Tipo de usuario</label>
            <select class="custom-select" id="tipousuario">
                <option value="1">ADMINSTRADOR</option>
                <option value="2">BASICO</option>
                <option value="3">INVITADO</option>
            </select>
          </div>
      </div>
        <div class="col-md-12">
            <div class="list-group list-menu">
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" ><span><i class="material-icons align-middle mr-3">speaker_notes</i>Publicaciones</span></a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" ><span><i class="material-icons align-middle mr-3">group</i>Perfil de usuarios</span></a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" ><span><i class="material-icons align-middle mr-3">not_interested</i>Restricciones</span></a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" tabindex="-1" aria-disabled="true" ><span><i class="material-icons align-middle mr-3">library_books</i>Marcas<span></a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"><span><i class="material-icons align-middle mr-3">local_printshop</i>Equipos</span></a>
                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" ><span><i class="material-icons align-middle">persons</i>Mi Perfil</span></a>
            </div>
      </div>
      <div id="result">
      </div>
      </div>
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
              //document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">Rilaz</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
  </script>
</body>
</html>

<?php
//}else{
 //   header("location: ../login.php");
//}
?>
