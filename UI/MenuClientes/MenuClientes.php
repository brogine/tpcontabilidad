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
	<form>
	<label for="TxtLocalidad" class="Label">Escriba La Ciudad en la que busca:</label>
	<input class="TextBox" onkeyup="Buscar()" type="text" id="TxtLocalidad">
	<label for="CboEspecialidades" class="Label">Seleccione La Especialidad:</label>
	<?php include '../../Servicio/rubroservicio.php';
	$RubroServ = new RubroServicio();
	$listaRubros = $RubroServ->Listar();
	echo "<select>";
    	foreach ($listaRubros as $rubro)
    	{
    		echo "<option value=".$rubro->Id.">".$rubro->Descripcion."</option>";	
    	}
    	echo "</select>";
	?>
	<input type="submit" value="Buscar!">
	</form>
	</div>
 	<div class="TurnosPendientes">

	</div>
</div>
</body>
</html>
