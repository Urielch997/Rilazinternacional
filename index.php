<html>
    <head>
        <title>Rilaz Internacional</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="cont" id="cont">
            <?php include 'nav.php';?>

         <div class="seccion-imagen-index" id="seccion">
           <ul>
             <li><img src="img/social_media_image_la.png"></li>
             <li><img src="img/rilazinternacional2.png"></li>
             <li><img src="img/toshiba.png"></li>
             <li><img src="img/1280px-Lexmark-primary-logo.svg.png" alt="insertar SVG con la etiqueta image"></li>
          </ul>
        </div>
        <div class="seccion">
            <div>
            <video id="video" autoplay controls poster="img/preview-vid-index.PNG">
                  <source src="http://www.rilazinternacional.com/video/Toshiba%20-%20World%20Premier%20of%20Hybrid%20Erasable%20MFP%204508LP.mp4" style="object-fit: fill;">
            </video>
          </div>
          <div class="info-video-principal">
              Linea ecologica de toshiba.
              <br>
              <button><a href="eco-print.php">Ver mas</a></button>
          </div>
        </div>
        <div class="seccion soluciones-th">
            <div class="titulo-soluciones-th">ESTUDIO GRATIS DE ANALISIS DE IMPRESION</div>
            <ul class="lista-solu-th">
              <li><a href="analisis-impresion.php"><span class="icon-steam2"></span>Iniciar</a></li>
            </ul>
        </div>
        <div class="seccion-cart">
            <div class="mini-cart">
                <div class="mini-titulo">Lexmark</div>
                <img src="img/mobile.jpg">
                <ul>
                    <li>Mismo firmware y sistema operativo en toda la cartera</li>
                    <li>Fácil de administrar y mantener actualizado con los últimos parches de seguridad y características nuevas</li>
                    <li>Asegura el cumplimiento de seguridad continuo con Markvision Enterprise</li>
                </ul>
            </div>
            <div class="mini-cart">
                <div class="mini-titulo">Toshiba</div>
                <img src="img/mfp_crop2.png">
                Desde copiadoras y señalización digital hasta soluciones empresariales que ayudan a racionalizar cualquier organización, Toshiba está potenciando el arte de los negocios.
            </div>
            <div class="mini-cart">
                <div class="mini-titulo">Soluciones</div>
                <img src="img/icons8_module_512px.png">
                <br>
                Software de gestión de impresión que está ayudando a cientos de millones de
                personas en todo el mundo a minimizar el desperdicio al tiempo que tiene una
                experiencia de impresión segura y fácil.
            </div>

        </div>
         <?php
            include "footer.php";
        ?>
        </div>
        <script src="js/menu.js" type="text/javascript"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src='js/css3-animate-it.js'></script>
<script type='text/javascript'>
  function videoplay(){
    var vid = document.getElementById('video');

    vid.muted = false;
    vid.play = true;

}

  setTimeout(videoplay,3000);
</script>
    </body>
</html>
