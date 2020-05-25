<html>
    <head>
        <title>Rilaz Internacional</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/cotizacion.css" rel="stylesheet">
        <link href="css/cotizacion.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/sweetAlert.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="cont" id="cont">
            <?php include 'nav.php';?>
        <div class="seccion">
            <h1>Solicitud de cotizacion</h1>
            <form id="correo" method="POST" action="#">
                <div class="div-form">
                    <label>Nombre:</label><span class="icon-user"></span><input type="text" spellcheck="false" name="nombre">
                </div>
                <div class="div-form">
                    <label>Telefono:</label><span class="icon-phone"></span><input type="text" spellcheck="false" name="telefono">
                </div>
                <div class="div-form">
                    <label>Correo:</label><span class="icon-envelop"></span><input type="email" spellcheck="false" name="correo">
                </div>
                <div class="div-form">
                <label>Mensaje:</label>
                <span class="icon-file-text" ></span>
                <textarea name="mensaje"></textarea>
                </div>
                <button type="submit"><span class="icon-checkmark2"></span>Enviar</button>
            </form>
        </div>
        <?php
            include "footer.php";
        ?>
        </div>
         
        </div>
        <script src="js/menu.js" type="text/javascript"></script>
        <script src="js/correo.js" type="text/javascript"></script>
        <script>
          window.load=function(){
if (screen.height <= 480) // mobile
{
document.getElementById("footer").style.zIndex = "-1";
}
}
        </script>
    </body>
</html>
