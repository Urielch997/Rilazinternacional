
<?php
session_start();
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

if(isset($_SESSION["user"]))
{
include ("../Controllers/usuarioControllers.php");
$obj = new usuarioControllers();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>
    Gestión de Usuarios

  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="Js/actionsUserN.js" type="text/javascript"></script>
  <script src="Js/acctionss.js" type="text/javascript"></script>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <!--<link rel="icon" type="image/png" href="../assets/img/favicon.png">-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Publicaciones
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="CSS/font-awesome.min.css">
  <link rel="stylesheet" href="../css/iconsmaterial.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

</head>
<body class="">
<?php include "nav.php";?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="collapse navbar-collapse justify-content-end">
              <?php echo "<h5><small>Te encuentras en:</small> Gesti&oacute;n de Usuarios </h5>";?>
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
        <div class="container-fluid">
          <button type='button' class='btn btn-info ' data-toggle='modal' data-target='#IngresarUsuario'>
            Nuevo Usuario
          </button>
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Datos De Usuario</h4>
                  <p class="card-category">Puedes Editarlo cuando quieras</p>
                </div>
                <div class="card-body">
                  <div id="salida" ></div>
                  <div id="s" >
                    <?php
                      echo $obj->listUsuariosTable();
                    ?>
                  </div>


                </div>
              </div>
            </div>

          </div>
        </div>
        <!--modal Update-->
        <div class="modal fade" id="Seleccionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Gestión de Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form name="formUsuarioAdmin" id="formUsuarioAdmin">
                <div class="row">
                   <div class='col-md-10'>
                        <div class='form-group'>
                          <label >Nombre</label>
                          <input type='text' name='txtnombre' id="txtnombre" class='form-control'>
                          <input type='hidden' name='txtidUPro' id="txtidUPro" lass='form-control' >


                        </div>
                      </div>
                      <div class='col-md-6'>
                        <div class='form-group'>
                          <label>Username</label>
                          <input type='text' name='txtusername' id="txtusername" class='form-control'>
                        </div>
                      </div>

                      <div class='col-md-6'>
                        <div class='form-group'>
                          <label >Direccion</label>
                          <input type='text' name='txtdireccion' id="txtdireccion" class='form-control'>
                        </div>
                      </div>
                      <div class='col-md-6'>
                        <div class='form-group'>
                          <label >Telefono</label>
                          <input type='text' name='txtnumtelefono' id="txtnumtelefono"  class='form-control'>
                        </div>
                      </div>
                      <div class='col-md-6'>
                        <div class='form-group'>
                          <label >Correo Electronico</label>
                          <input type='email' name='txtcoreeo' id="txtcoreeo"  class='form-control'>
                        </div>
                      </div>
                    <?php
                        echo $obj->listarPerfil();
                     ?>
                </div>


              </form>
              <button name="btnUsuarioUdate" id="updateProfileadmin" class="btn btn-primary pull-right">Actualizar</button>
              <button name="deleteProfileadmin" id="deleteProfileadmin" class="btn btn-warning pull-right">Desactivar</button>

            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>
      <!--fin modal-->


        <!--modal Activate-->
        <div class="modal fade" id="SeleccionarActivar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Activar?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form name="activarUsuario" id="activarUsuario">

                <div class="row">
                   <div class='col-md-10'>
                        <div class='form-group'>
                          <label >Nombre</label>
                          <input type='text' name='txtnombre'  class='form-control'>
                          <input type='hidden' name='txtidUPro'  lass='form-control' >
                        </div>
                      </div>
                </div>
              </form>
              <button name="btnACtivar" id="btnACtivar" class="btn btn-primary pull-right">Activar Usuario</button>
            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>
      <!--fin modal-->

       <!--modal Ingresar-->
       <div class="modal fade" id="IngresarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Ingresar Usuario Nuevo</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
             <form name="formUsuarioIngreso" id="formUsuarioIngreso">
              <div class="row">
                <div class='col-md-10'>
                     <div class='form-group' id="nombre">
                       <label >Nombre</label>
                       <input type='text' name='txtnombre'  id="txtnombreNU" class='form-control' required>
                       <input type='hidden' name='txtidUPro'  lass='form-control' >


                     </div>
                   </div>
                   <div class='col-md-6'>
                     <div class='form-group' id="username">
                       <label>Username</label>
                       <input type='text' name='txtusername' id="txtusername"   class='form-control' required>
                     </div>
                   </div>
                   <div class='col-md-6'>
                     <div class='form-group' id="password">
                       <label >Password</label>
                       <input type='password' name='txtpass' id="txtpass"  class='form-control' required>
                     </div>
                   </div>
                   <div class='col-md-6'>
                     <div class='form-group' id="direccion">
                       <label >Direccion</label>
                       <input type='text' name='txtdireccion' id="txtdireccion" class='form-control' required>
                     </div>
                   </div>
                   <div class='col-md-6'>
                     <div class='form-group'>
                       <label >Telefono</label>
                       <input type='text' name='txtnumtelefono'  class='form-control' >
                     </div>
                   </div>
                   <div class='col-md-6'>
                     <div class='form-group' id="correo">
                       <label >Correo Electronico</label>
                       <input type='text' name='txtcoreeo' id="txtcoreeo"  class='form-control' required>
                     </div>
                   </div>

                 <?php
                     echo $obj->listarPerfil();
                  ?>
             </div>

             </form>




             <button name="btnUsuarioIngreso" id="IngresoProfile" class="btn btn-primary pull-right">Ingresar</button>

           </div>
           <div class="modal-footer">

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
     <!--fin modal-->

      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="Js/sweetAlert.js" type="text/javascript"></script>
</body>
</html>

<?php
}else{
    header("location: ../login.php");
}
?>
