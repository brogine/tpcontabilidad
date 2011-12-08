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
	
	<form action="MenuClientes.php" method="POST">
	
	<label for="TxtLocalidad" class="Label">Escriba La Ciudad en la que busca:</label>
	
	<input class="TextBox" onkeyup="Buscar()" type="text" id="TxtLocalidad" name="TxtLocalidad">
	
	<label for="CboEspecialidades" class="Label">Seleccione La Especialidad:</label>
	
<?php include '../../Servicio/especialidadservicio.php';
	$EspServ = new EspecialidadServicio();
	$listaEsp = $EspServ->Listar();
	//Lista De Especialidades
	echo "<select id='CboEspecialidades' name='CboEspecialidades'>";
    	foreach ($listaEsp as $esp)
    	{
    		echo "<option value=".$esp->IdEspecialidad.">".$esp->Nombre."</option>";	
    	}
    	echo "</select>";
	?>
	<input type="submit" value="Buscar!">
	</form>
</div>
	
 	<div class="TurnosPendientes">
	<?php 
	if($_POST)
	{
		echo "<div>";
		$Localidad=$_POST['TxtLocalidad'];
		$trozos = explode(" - ", $Localidad);

		$Localidad = $trozos[1];
		$Especialidad=$_POST['CboEspecialidades'];
		include '../../Servicio/medicoservicio.php';
	
		$MedicoServ = new MedicoServicio();
		$ListaMedicos = $MedicoServ->ListarPorEspecialidadLocalidad($Especialidad, $Localidad);
		echo "<table>";
		echo "<tr>";
		echo "<th>Nombre De La Clinica</th>";
		echo "<th>Direccion De La Clinica</th>";
		echo "<th>Nombre Del Medico</th>";
		echo "<th>Especialidad Del Medico</th>";
		echo "</tr>";
		foreach ($ListaMedicos as $Medicos)
		{
			echo "<tr>";
			echo "<td>";
			echo $Medicos->Clinica->Nombre;
			echo "</td>";
			echo "<td>";
			echo $Medicos->Clinica->Ubicacion->Domicilio;
			echo "</td>";
			echo "<td>";
			echo $Medicos->Nombre;
			echo "</td>";
			echo "<td>";
			echo $Medicos->Especialidad->Nombre;
			echo "</td>";
			echo "<td>";
			echo "<a href=''>Solicitar Turno!</a>";
			echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "</div>";
		
	}
	?>
	</div>
</div>
</body>
</html>
