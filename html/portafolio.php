<?php
    include '../dao/daoUpload.php';
	include 'segmentos/nav.php'; 
?>
<html>
	<head>
		<title></title>
		<link href="../css/portafolio.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, user-scalable=no">
	</head>
	<body>
	<div class="up">A</div>
	<div class="cont">
			<div class="opciones" id="opciones">
				<label>Tipo de producto:</label><span class="icon-circle-down"></span>
				<div class="op"><input type="checkbox" id="checkbox" name="tipo[]" value="0"><label class="checkbox" for="checkbox"></label><label class="l">Todo</label></div>
				<div class="op"><input type="checkbox" id="checkbox2" name="tipo[]" value="1"><label class="checkbox2" for="checkbox2"></label><label class="l">Monocromatica</label></div>
				<div class="op"><input type="checkbox" id="checkbox3" name="tipo[]" value="2"><label class="checkbox3" for="checkbox3"></label><label class="l">Color</label></div>
				<label>Marca:</label>
				<div class="op"><input type="checkbox" id="lexmark" name="tipo[]" value="2"><label class="checkbox4" for="lexmark"></label><label class="l">Lexmark</label></div>
				<div class="op"><input type="checkbox" id="toshiba" name="tipo[]" value="2"><label class="checkbox5" for="toshiba"></label><label class="l">Toshiba</label></div>
			</div>
		<div class="content" id="cont2">
				
		</div>

	<footer id="footer">
		<ul>
			<li><span class="icon-facebook"></span></li>
			<li><span class="icon-twitter"></span></li>
		</ul>
		&copy 2020
	</footer>
	<script src="../js/menu.js" type="text/javascript"></script>
	<script src="../js/jquery.min.js" type="text/javascript"></script>
	<script src="../js/ajax.js" type="text/javascript"></script>
	</body>
</html>