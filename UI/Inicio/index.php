<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet"/>
<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet"/>

<link href="Inicio.css" type="text/css" rel="stylesheet"/>
<script type="text/javascript" src="Inicio.js"></script>
<link href="../Commons/Publicidad/Publicidad.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="../Commons/Publicidad/jquery.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/jCarouselLite.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/captify.tiny.js"></script>
<script type="text/javascript" src="../Commons/Publicidad/Publicidad.js"></script>

</head>

<body>


<div>
<?php include_once '../Commons/Header/Header.php';?>
</div>
<div id="Contenido">

<table>
<tr>
<td id="Celda"><div id="Megabutton" onclick="Direccionar('../Clientes/Clientes.php')"><p>Quiero Sacar Turnos!</p></div></td>
<td id="Celda"><div id="Megabutton" onclick="Direccionar('../Clinicas/Clinicas.php')"><p>Quiero Dar Turnos!</p></div></td>
</tr>
</table>
<div class="publicidad">
<?php include_once '../Commons/Publicidad/index.php';?>
</div>	
</div>
<div id="Pie">
<?php include_once '../Commons/Footer/index.php';?>
</div>

</body>

</html>