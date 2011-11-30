<html>
<head>
<link href="MenuClientes.css" type="text/css" rel="stylesheet" />
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet" />
<script language="JavaScript" src ="Ubicacion.js"> </script>
<script language="JavaScript" src ="Buscador.js"> </script>
</head>

<body>
<?php include_once '../Commons/Header/Header.php';?>

<div class="MCPrincipal">
<div id="Buscador">
<label for="TxtLocalidad">En que cuidad desea buscar un profesional?:</label>
<input onkeydown="Buscar()" type="text" id="TxtLocalidad">
</div>
<div id="Resultado" class="Lista">
</div>
<div class="TurnosPendientes">
<p>Turnos Pendientes</p>

</div>

</div>




</body>
</html>
