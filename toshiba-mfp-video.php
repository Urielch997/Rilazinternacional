<html>
    <head>
        <title>Rilaz Internacional</title>
        <meta charset="UTF-8">
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
                    <source src="https://toshibatec.ca/wp-content/uploads/2019/06/ErasingDocuments.mp4" style="object-fit: fill;"></source>
                </video>
                <label>APRENDE A USAR BORRAR DOCUMENTOS EN ESTE VIDEO</label>
            </div>
            <div>
                <ul>
                    <li class="listado-video"><div>Preparando su equipo<img src="img/icons8_expand_arrow.ico"></div>
                        <ul class="children">
                            <li onclick="videotoshiba(0,'Aprende a usar borrar documentos en este video')"><img src="img/preview/toshiba/toshiba.png">Aprende a usar borrar documentos en este video</li>
                            <li onclick="videotoshiba(1,'Aprenda a usar el informe de reutilización de papel de e-bridge en este video')"><img src="img/preview/toshiba/toshiba.png">Aprenda a usar el informe de reutilización de papel de e-bridge en este video</li>
                            <li onclick="videotoshiba(2,'Aprenda a usar el cambio de modo de tóner en este video')"><img src="img/preview/toshiba/toshiba.png">Aprenda a usar el cambio de modo de tóner en este video</li>
                            <li onclick="videotoshiba(3,'Aprenda a usar la impresión basada en reglas en este video')"><img src="img/preview/toshiba/toshiba.png">Aprenda a usar la impresión basada en reglas en este video</li>
                            <li onclick="videotoshiba(4,'Aprenda a usar la función job-build en este video')"><img src="img/preview/toshiba/toshiba.png">Aprenda a usar la función job-build en este video</li>

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
