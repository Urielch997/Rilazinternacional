<html>
    <head>
        <title>Rilaz Internacional</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link rel="stylesheet" href="css/analisis.css">
        <script src="js/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="cont" id="cont">
            <?php
                include 'nav.php';
            ?>

         <div class="seccion" id="seccion">
           <div class="titulo">Analisis de impresion</div>
           <form class="" action="#" method="post">
             <div class="titulo detalle">informacion del cliente</div>
             <div class="fila"><div class="colum">Nombre o razon social:</div><div class="colum"><input type="text" name="" value="" class="input-text" placeholder="Nombre o razon social"></div></div>
             <div class="fila"><div class="colum">Cantidad de empleados (aproximadamente): </div><div class="colum"><input type="number" class="input-text" name="" value="" min="1" placeholder="Cantidad de empleados"></div></div>
             <div class="fila"><textarea class="input-text" placeholder="Mensaje"></textarea></div>
             <button>Enviar</button>
           </form>
         </div>
            <?php
                include "footer.php";
            ?>
        </div>
        <script src="js/menu.js" type="text/javascript"></script>
    </body>
</html>
