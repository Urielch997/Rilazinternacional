<html>
    <head><meta charset="gb18030">
        <title>Rilaz Internacional</title>
        
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/video.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="cont" id="cont">
            <?php 
                include 'nav.php';
?>
            lexmark MX622
         <div class="seccion" id="seccion">
             <div></div>
            <div id="video">
                <video autoplay controls>
                    <source src="https://publications.lexmark.com/media/ids_assets/videos/MS62x_MX62x/videos/lexmark_setting_up_the_printer_mfp_video.mp4" style="object-fit: fill;"></source>
                </video>
                <label>Configurar la impresora</label>
            </div>
            <div>
                <ul>
                    <li class="listado-video"><div>Preparando su equipo<img src="img/icons8_expand_arrow.ico"></div>
                        <ul class="children">
                            <li onclick="video(0,'Configurar la impresora')"><img src="img/preview/lexmark/MX622.PNG">Configurar la impresora</li>
                            <li onclick="video(1,'Instalar bandejas opcionales')"><img src="img/preview/lexmark/instalar-bandejas.PNG">Instalar bandejas opcionales</li>
                            <li onclick="video(2,'Instalación de MarkNet 8372')"><img src="img/preview/lexmark/wireless.PNG">Instalación de MarkNet 8372</li>
                        </ul>
                    </li>
                    <li class="listado-video"><div>Usando su impresora<img src="img/icons8_expand_arrow.ico"></div>
                         <ul class="children">
                            <li onclick="video(3,'Cargar el alimentador multiuso')"><img src="img/preview/lexmark/cargar-bandeja.PNG">Cargar el alimentador multiuso</li>
                        </ul>
                    </li>
                    <li class="listado-video"><div>Reemplazo de suministro<img src="img/icons8_expand_arrow.ico"></div>
                         <ul class="children">
                            <li onclick="video(4,'Sustitucion del cartucho de toner')"><img src="img/preview/lexmark/sustituir-toner.PNG">Sustitucion del cartucho de toner</li>
                            <li onclick="video(5,'Sustitucion de la unidad de imagen')"><img src="img/preview/lexmark/unidad-imagen.PNG">Sustitucion de la unidad de imagen</li>
                        </ul>
                    </li>
                </ul>
            </div>
            
        </div>
        
         <?php
            include "footer.php";
        ?>
        </div>
        <script src="js/menu.js" type="text/javascript"></script>
        <script src="js/video.js" type="text/javascript"></script>
    </body>
</html>