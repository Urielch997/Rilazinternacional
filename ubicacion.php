<html>
    <head>
        <title>Rilaz Internacional</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/ubicacion.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="js/leaflet.css" />
        <link rel="stylesheet" href="css/modal.css" />
        <script src="js/leaflet.js"></script>
    </head>
    <body>
        <div class="cont" id="cont">
            <?php include 'nav.php';?>
         <div class="seccion" id="seccion">
             <div class="info-ubicacion">
             Rilaz Internacional.<br>
             Cuenta con agencias en distintos paises en los cuales se encuentra.<br>
             <b>El salvador como Rilaz S.A de C.V.</b><br>
             Tambien contamos con presencia en los paises con sub distribuidores:<br>
             <b>Guatemala</b>
             </div>
             <h1>Subdistribuidores</h1>
            <div id="map" style="width: 500px; height: 400px;"></div>
            <div class="formulario">
               <!-- <form>
                    <label>Buscar:</label>
                    <input type="text" placeholder="Buscar">
                </form>-->
                <ul>
                    <li onclick="mark(14.8424397,-91.5287033,'Fotocopiadoras wega')" alt='Wega fotocopiadoras'><img src="img/wega.jpg"><button><a href="#wega">Ver mas detalles de Sub distribuidor</a></button></li>
                    <li onclick="mark(14.585102,-90.58603,'Copi IT Digital')"><img src="img/copyitdigital.png" alt='Copy IT Digital'><button><a href="#copi">Ver mas detalles de Sub distribuidor</a></button></li>
                    <li onclick="mark(15.47055,-90.367703,'Rapicopias Coban')"><img src="img/rapicopias.png"><button><a href="#rapi">Ver mas detalles de Sub distribuidor</a></button></li>
                    <li onclick="mark(13.6610281,-89.2566412,'Rilaz S.A de C.V')"><img src="https://static.wixstatic.com/media/7f8705_e82268e038dc0314790064f79fb1d671.png_512"><button><a href="#rilaz">Ver mas detalles de Sub distribuidor</a></button></li>
                    <li onclick="mark(13.6610281,-89.2566412,'Rilaz Internacional)"><img src="img/rilazinternacional2.png"><button><a href="#rilazinter">Ver mas detalles de Sub distribuidor</a></button></li>
                </ul>
            </div>
        </div>
        <div class="seccion" id="wega">
            <h3>Wega Fotocopiadoras</h3>
            <div class="sub-info">
                <img src="https://lh5.googleusercontent.com/p/AF1QipMz7iovWjgkOH3-tCKFbd8OC8Dn_ttLLEgMO6cf=w408-h279-k-no">
            </div>
            <div class="sub-info">
                <ul>
                    <li><span class="icon-earth"></span><a href="https://www.wegafotocopiadoras.com/" target="_blank"> https://www.wegafotocopiadoras.com/</a></li>
                    <li><span class="icon-location2"></span>22 avenida B-57 zona 3 Quetzaltenango, Guatemala, 09001, Guatemala</li>
                    <li><span class="icon-mobile"></span>+502 7761 8089</li>
                </ul>
           </div>
        </div>
        <div class="seccion" id="copi">
            <h3>Copy IT Digital</h3>
            <div class="sub-info">
                <img src="img/copyitdigital.png">
            </div>
            <div class="sub-info">
                <ul>
                    <li><span class="icon-earth"></span><a href="https://copydigital.com.gt/" target="_blank">https://copydigital.com.gt</a></li>
                    <li><span class="icon-location2"></span>3ra avenida 2-81 Balcones de San Cristóbal, zona 8 de Mixco.</li>
                    <li><span class="icon-mobile"></span>(+502) 4001 1395</li>
                </ul>
           </div>
        </div>

        <div class="seccion" id="rapi">
            <h3>Rapicopias coban</h3>
            <div class="sub-info">
                <img src="data:image/jpeg;base64,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">
            </div>
            <div class="sub-info">
                <ul>
                    <li><span class="icon-earth"></span><a href="https://rapicopiascoban.com.gt/" target="_blank">https://rapicopiascoban.com.gt/</a></li>
                    <li><span class="icon-location2"></span>1ra. calle 7-50, zona 3
Coban, A.V.</li>
                    <li><span class="icon-mobile"></span>(+502) 7952 – 2627</li>
                </ul>
           </div>
        </div>

        <div class="seccion" id="rilaz">
            <h3>Rilaz S.A de C.V.</h3>
            <div class="sub-info">
                <img src="https://lh5.googleusercontent.com/p/AF1QipMvNkLT3vT9hIPpw8K5wwaksLeRWnCWOYX_qvo4=w426-h240-k-no">
            </div>
            <div class="sub-info">
                <ul>
                    <li><span class="icon-earth"></span><a href="https://www.rilaz.com.sv/" target="_blank">https://www.rilaz.com.sv/</a></li>
                    <li><span class="icon-location2"></span>SANTA ELENA || Av. bella vista N° 6 poligono 1</li>
                    <li><span class="icon-mobile"></span>(+503) 2536-5518</li>
                </ul>
           </div>
        </div>

        <div class="seccion" id="rilazinter">
            <h3>Rilaz Internacional</h3>
            <div class="sub-info">
                <img src="img/rilazinternacional2.png">
            </div>
            <div class="sub-info">
                <ul>
                    <li><span class="icon-location2"></span>Calle 2A 25-19 Zona 15, Colonia Vista Hermosa 1 Edificio Multimedia Oficina 1211 Guatemala</li>
                    <li><span class="icon-mobile"></span>(+503) 2536-5518</li>
                </ul>
           </div>
        </div>

        <?php
            include "footer.php";
        ?>
        </div>
        <script src="js/menu.js" type="text/javascript"></script>
<script type="text/javascript">
var map = L.map('map').setView([14.8424397,-91.5287033], 7);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

L.marker([14.8424397,-91.5287033]).addTo(map)
    .bindPopup('Fotocopiadoras wega')
    .openPopup();

L.marker([14.585102,-90.58603]).addTo(map)
    .bindPopup('Copi IT Digital')
    .openPopup();

L.marker([15.47055,-90.367703]).addTo(map)
    .bindPopup('Rapicopias Coban')
    .openPopup();

  L.marker([13.6610281,-89.2566412]).addTo(map)
        .bindPopup('Rilaz S.A de C.V')
        .openPopup();

     var theMarker = {};

function mark(inicio,final,nombre){

    if (theMarker != undefined) {
              map.removeLayer(theMarker);
        };

    //Add a marker to show where you clicked.
     theMarker = L.marker([inicio,final]).addTo(map)
    .bindPopup(nombre)
    .openPopup();
}
  </script>

  <script>
  $(document).ready(function(){
  $('a[href^="#"]').click(function(event){
    //Aquí elimina el evento normal de la etiqueta <a>
    event.preventDefault();
    //Aquí cojemos el elmento
    var elem=$(this).attr("href");
    $("html, body").animate({
      scrollTop: $(elem).offset().top - 100
    },800);
  });
});
  </script>
    </body>
</html>
