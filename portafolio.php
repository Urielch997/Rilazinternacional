<?php
    include 'controles/daoUpload.php';
?>
<html>
	<head>
		<title></title>
		<link href="css/estilo.css" rel="stylesheet">
		<link href="css/footer.css" rel="stylesheet">
		<link href="css/portafolio-lexmark.css" rel="stylesheet">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<script src="js/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
	<?php
	include 'nav.php';
?>
	<div class="cont" id="portafolio">
			<div class="opciones" id="opciones">
				<label>Tipo de producto:</label><span class="icon-circle-down"></span>
				<div class="op"><input type="checkbox" id="checkbox" name="tipo[]" class="valores" value="0"><label class="checkbox" for="checkbox"></label><label class="l">Todo</label></div>
				<div class="op"><input type="checkbox" id="checkbox2" name="tipo[]" class="valores" value="1"><label class="checkbox2" for="checkbox2"></label><label class="l">Monocromatica</label></div>
				<div class="op"><input type="checkbox" id="checkbox3" name="tipo[]" class="valores" value="2"><label class="checkbox3" for="checkbox3"></label><label class="l">Color</label></div>
			<label>Estado:</label>
				<div class="op"><input type="checkbox" id="estado" name="estado" class="estado" value="1"><label class="estado" for="estado"></label><label class="l">Nuevo</label></div>
        		<div class="op"><input type="checkbox" id="estado2" name="estado" class="estado" value="2"><label class="estado2" for="estado2"></label><label class="l">Usado</label></div>
			</div>
		<div class="content" id="cont2">

		</div>
		<div class="iframe-present">
			<h3>Catalogo de todos los equipos Toshiba</h3>
			<iframe src="https://docs.google.com/presentation/d/e/2PACX-1vRwQ1igCIW686r7dmjFYJQ5_WV7ZmRbvSaAzaVCWo5aRmXYGLmXJSPHOdj_qWSv7A/embed?start=true&loop=true&delayms=3000" frameborder="0" width="960" height="569" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
 		</div>
	<?php
	include 'footer.php';
?>
</div>
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/ajax.js" type="text/javascript"></script>
	<script src="js/menu.js" type="text/javascript"></script>
	</body>
</html>
