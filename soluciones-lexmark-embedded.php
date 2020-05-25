<html>
    <head>
        <title>Rilaz Internacional</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <link href="css/estilo.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/stacktable.css" rel="stylesheet">
        <link href="css/soluciones-lexmarak-embedded.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/stacktable.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="cont" id="cont">
            <?php
                include 'nav.php';
            ?>
         <div class="seccion" id="seccion">
            <div class="titulo">Catalogo de soluciones Embedded</div>
            <div class="tabla-responsive">
                <table id="websendeos">
                    <tr>
                        <th colspan="2">Captura y ruta</th>
                        <th></th>
                        <th>N° de parte</th>
                        <th>De pago</th>
                        <th>Licencias</th>
                        <th>implementación</th>
                        <th>disco duro necesario</th>
                    </tr>
                    <tr>
                        <td><img src="img/accuRead.png"></td>
                        <td>La aplicación AccuRead Automate de Lexmark permite un
                                Lexmark smart MFP para capturar, automáticamente
                                clasificar y enrutar documentos, mientras extrae la clave
                                información para nombrar e indexar archivos. Mínimo
                                Se requiere 1 GB de DRAM.
                        </td>
                        <td>Ver lista de precios</td>
                        <td>Si</td>
                        <td>Por dispositivo</td>
                        <td>Instalar socio</td>
                        <td>Si</td>
                    </tr>
                    <tr>
                        <td><img src="img/acureadocr.png"></td>
                        <td>Crear archivos con capacidad de búsqueda o editables (con capacidad de búsqueda
                            PDF, RTF, TXT) en una impresora multifunción con capacidad Lexmark.
                            Requiere disco duro. Puede requerir DRAM adicional
                            memoria 1. Prueba de 30 días disponible.
                        </td>
                        <td>82S0533</td>
                        <td>Si</td>
                        <td>Por dispositivo</td>
                        <td>Instalar socio</td>
                        <td>Si</td>
                    </tr>
                    <tr>
                        <td><img src="img/emaillimiter.png"></td>
                        <td>Crear archivos con capacidad de búsqueda o editables (con capacidad de búsqueda
                            PDF, RTF, TXT) en una impresora multifunción con capacidad Lexmark.
                            Requiere disco duro. Puede requerir DRAM adicional
                            memoria 1. Prueba de 30 días disponible.
                        </td>
                        <td>82S0533</td>
                        <td>Si</td>
                        <td>Por dispositivo</td>
                        <td>Instalar socio</td>
                        <td>Si</td>

                    </tr>
                </table>
            </div>
        </div>
         <?php
            include "footer.php";
        ?>
        </div>
        <script src="js/menu.js" type="text/javascript"></script>
        <script>
     $('table').stacktable();
     $('.st-val').attr("colspan","2");
</script>
    </body>
</html>
