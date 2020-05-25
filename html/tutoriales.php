<?php
    include '../dao/daoUpload.php';
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
		<nav><label for="menu"><span class="icon-menu"></span></label><b>Rilaz Internacional</b>
			<input type="checkbox" id="menu">
			<ul>
				<a href="../index.html"><li>Inicio</li></a>
				<li>Equipos</li>
				<a href="../login.php"><li>Login</li></a>
			</ul>
		</nav>
			<div class="opciones" id="opciones">
				<label>Tipo de producto:</label><span class="icon-circle-down"></span>
				<div class="op"><input type="checkbox" id="checkbox" name="tipo[]" value="0"><label class="checkbox" for="checkbox"></label><label class="l">Todo</label></div>
				<div class="op"><input type="checkbox" id="checkbox2" name="tipo[]" value="1"><label class="checkbox2" for="checkbox2"></label><label class="l">Monocromatica</label></div>
				<div class="op"><input type="checkbox" id="checkbox3" name="tipo[]" value="2"><label class="checkbox3" for="checkbox3"></label><label class="l">Color</label></div>
			</div>
		<div class="content" id="cont2">
				
		</div>

	<footer id="footer">
		<ul>
			<li><span class="icon-facebook"></span></li>
			<li><span class="icon-twitter"></span></li>
		</ul>
		&copy 2019
	</footer>
	<script src="../js/menu.js" type="text/javascript"></script>
	<script src="../js/jquery.min.js" type="text/javascript"></script>
	<script src="../js/ajax.js" type="text/javascript"></script>
	</body>
</html>