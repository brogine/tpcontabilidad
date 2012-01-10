<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" media="all" href="../Commons/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/960.css" />

<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet" />

<link href="Inicio.css" type="text/css" rel="stylesheet" />

<link href="../Commons/Publicidad/Publicidad.css" type="text/css" rel="stylesheet" />

<script type="text/javascript" src="Inicio.js"></script>

<script type="text/javascript" src="../Commons/Publicidad/jquery.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/jCarouselLite.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/captify.tiny.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/Publicidad.js"></script>

</head>

<body>

<?php include_once '../Commons/Header/Header.php';?>
<div class="container_12" id="Contenido">
<div class="grid_5 prefix_1">
	<div class="Megabutton" onclick="Direccionar('../Clientes/Clientes.php')">
		<p>Quiero Sacar Turnos!</p>
	</div>
</div>
<div class="grid_5">
	<div class="Megabutton" onclick="Direccionar('../Clinicas/Clinicas.php')">
		<p>Quiero Dar Turnos!</p>
	</div>
</div>
<div class="grid_12 prefix_1 publicidad">
<?php include_once '../Commons/Publicidad/index.php';?>
</div>
</div>
<?php include_once '../Commons/Footer/index.php';?>

</body>
</html>