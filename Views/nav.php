<div class="wrapper ">
  <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo">
      <center>
        <img src="img/Rilaz.png">
       <h4>Rilaz Internacional</h4>
      </center>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <?php
          if (in_array("0", $d)){
        ?>
        <li class="nav-item">
          <a class="nav-link" href="Publicaciones.php">
            <i class="material-icons">speaker_notes</i>
            <p>publicaciones</p>
          </a>
        </li>
        <?php
            }
          if (in_array("1", $d)){
          ?>
          <li class='nav-item'>
            <a class='nav-link' href='controlUsuario.php'>
              <i class='material-icons'>group</i>
              <p>Perfil De Usuarios</p>
            </a>
        </li>
        <?php
          }

          if (in_array("2", $d))
          {
      ?>
          <li class='nav-item '>
          <a class='nav-link' href='ControlRestricciones.php'>
            <i class='material-icons'>not_interested</i>
            <p>Restrcciones</p>
          </a>
        </li>
        <?php
          }

          if (in_array("3", $d)){

        ?>
        <li class="nav-item">
          <a class="nav-link" href="Marcas.php">
            <i class="material-icons">library_books</i>
            <p>Marcas</p>
          </a>
        </li>
      <?php
    }
        if (in_array("4", $d)){

      ?>
        <li class="nav-item">
          <a class="nav-link" href="equipos.php">
            <i class="material-icons">local_printshop</i>
            <p>Equipos</p>
          </a>
        </li>
        <?php  }
        if (in_array("5", $d)){

        ?>

        <li class="nav-item ">
          <a class="nav-link" href="usuario.php">
            <i class="material-icons">persons</i>
            <p>Mi Perfil</p>
          </a>
        </li>
        <?php
      }
        ?>
        <li class="nav-item ">
            <a class="nav-link"  href="../Controllers/acceso.php?cerrar">
              <i class="material-icons">keyboard_return</i>
              <p>cerrar Session</p>
            </a>
        </li>
      </ul>
    </div>
  </div>
