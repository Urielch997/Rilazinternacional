<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="150x76" href="assets/img/faces/LogoRilaz.png">
    <link rel="icon" type="image/png" href="assets/img/faces/LogoRilaz.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Login
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css" rel="stylesheet" />

    <style>
        .encabezado {
            background: #4895F8 !important;

        }
        BODY{
            background:lightblue;
        }

    </style>
</head>

<body style="background:#2962ff">
    <div class="content">
        <div class="container-fluid">
            <br>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header card-header-info encabezado">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <h4 class="card-title"><img class="img"
                                                src="assets/img/faces/logoRilaz.png" />
                                         INTERNATIONAL RILAZ
                                        </h4>
                                    </center>

                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST" id="login">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <br>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Username</label>
                                            <input type="text" name="txtUsuario" class="form-control">
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="clearfix"></div>

                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <br>
                                        <div class="form-group">
                                            <label class="bmd-label-floating">password</label>
                                            <input type="password" name="txtContra" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                        <center>
                                            <br>
                                            <button type="submit" name="btnIngresar" class="encabezado btn btn-info" id="singin">
                                                Iniciar
                                            </button>
                                            <a href="index.php" class="btn btn-success">
                                                Volver
                                            </a>
                                        </center>
                                    </div>

                                    <br><br><br><br><br><br><br><br>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="copyright float-right">
                                                &copy;
                                                <script>
                                                    document.write(new Date().getFullYear())
                                                </script>
                                                <a href="https://www.rilaz.com.sv" target="_blank">Rilaz S.A. de
                                                    C.V.</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
</body>
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/plugins/sweetalert2.js"></script>
<script src="js/login.js"></script>
</html>
