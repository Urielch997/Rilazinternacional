   <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
      <center>
         <img src="img/logo.png">
        <h4>Rilaz Internacional</h4>
       </center>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item alert-info">
            <a class="nav-link" href="Publicaciones.php">
              <span class="icon-file-text"></span>
              <p>publicaciones</p>
            </a>
          </li>
         
          <?php
            if($_SESSION["user"]["Perfil"] == "1")
            {
              echo "
            <li class='nav-item '>
              <a class='nav-link' href='controlUsuario.php'>
                <span class='icon-user'></span>
                <p>Perfil De Usuarios</p>
              </a>
          </li>
            ";
            }
          ?>
          <?php
            if($_SESSION["user"]["Perfil"] == "1")
            {
              echo "
            <li class='nav-item '>
            <a class='nav-link' href='ControlRestricciones.php'>
              <span class='icon-blocked'></span>
              <p>Restrcciones</p>
            </a>
          </li>
            ";
            }
          ?>
          <li class="nav-item ">
            <a class="nav-link" href="Marcas.php">
              <span class="icon-price-tags"></span>
              <p>Marcas</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="usuario.php">
              <span class='icon-user'></span>
              <p>Mi Perfil</p>
            </a>
          </li>

          <li class="nav-item ">
              <a class="nav-link"  href="equipos.php">
                <span class="icon-truck"></span>
                <p>Equipos</p>
              </a>
          </li>
          
          <li class="nav-item ">
              <a class="nav-link"  href="../Controllers/acceso.php?cerrar">
                <span class="icon-enter"></span>
                <p>cerrar Session</p>
              </a>
          </li>

           
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="collapse navbar-collapse justify-content-end">
            <?php echo " <h5><small>Te encuentras en:</small> Listado de Publicaciones</h5>";?>
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
                  <span class='icon-user'></span>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="usuario.php">Perfil</a>
                  <a class="dropdown-item" href="Publicaciones.php">Publicaciones</a>
                  <a class="dropdown-item" href="capacitaciones.php">Capacitaciones</a>
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