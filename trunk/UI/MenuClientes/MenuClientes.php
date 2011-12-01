<html>
<head>
<link href="MenuClientes.css" type="text/css" rel="stylesheet" />
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet" />
<script language="JavaScript" src ="Ubicacion.js"> </script>
<script language="JavaScript" src ="Buscador.js"> </script>
</head>

<body>
<?php include_once '../Commons/Header/Header.php';?>

<div id="Principal" class="MCPrincipal">
	<div id="Buscador" class="Buscador">
	<label for="TxtLocalidad">En que cuidad desea buscar un profesional?:</label>
	<input class="TextBox" onkeyup="Buscar()" type="text" id="TxtLocalidad">
	</div>

<div class="TurnosPendientes">

</div>

</div>
</body>
</html>
