<html>
<head>
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet"/>
<link href="MenuClientes.css" type="text/css" rel="stylesheet" />
<script language="JavaScript" src ="Ubicacion.js"> </script>
<script language="JavaScript" src ="Buscador.js"> </script>
</head>

<body>
<?php include_once '../Commons/Header/Header.php';?>
<div id="Principal" class="MCPrincipal">
	
	<div id="Buscador" class="Buscador">
	
	<form action="MenuClientes.php" method="POST">
	<table class="Menu">
	<tr>
	<td>
	<label for="TxtLocalidad" class="Label">Escriba La Ciudad en la que busca:</label>
	<input autocomplete="off" class="TextBox" onkeyup="Buscar()" type="text" id="TxtLocalidad" name="TxtLocalidad">
	</td>
	<td>
	<label for="CboEspecialidades" class="Label">Seleccione La Especialidad:</label>
	
<?php include '../../Servicio/especialidadservicio.php';
	$EspServ = new EspecialidadServicio();
	$listaEsp = $EspServ->Listar();
	//Lista De Especialidades
	echo "<select class='Combo' id='CboEspecialidades' name='CboEspecialidades'>";
    	foreach ($listaEsp as $esp)
    	{
    		echo "<option value=".$esp->IdEspecialidad."-".$esp->Nombre.">".$esp->Nombre."</option>";	
    	}
    	echo "</select>";
	?>
	</td>
	
	<td>
	<input class="Buscar" type="submit" value="Buscar!">
	</td>
	</tr>
	</table>
	</form>
</div>
	
 	<div class="TurnosPendientes">
	<?php 
	if($_POST)
	{
		echo "<div>";
		$Localidad=$_POST['TxtLocalidad'];
		if($Localidad!="")
		{
		$trozos = explode(" - ", $Localidad);

		$Localidad = $trozos[1];
		}
		$Especialidad=$_POST['CboEspecialidades'];
		$Espec = explode("-",$Especialidad);
		include '../../Servicio/medicoservicio.php';
	
		$MedicoServ = new MedicoServicio();
		$ListaMedicos = $MedicoServ->ListarPorEspecialidadLocalidad($Espec[0], $Localidad);
		if($ListaMedicos)
		{
		echo "<table class='Tabla'>";
		echo "<tr>";
		echo "Resultados Para ".$Espec[1]." en ".$Localidad;
		echo "</tr>";
		echo "<tr>";
		echo "<th class='Bordeado'>Nombre De La Clinica</th>";
		echo "<th class='Bordeado'>Direccion De La Clinica</th>";
		echo "<th class='Bordeado''>Nombre Del Medico</th>";
		echo "<th class='Bordeado'>Especialidad Del Medico</th>";
		echo "</tr>";
		foreach ($ListaMedicos as $Medicos)
		{
			echo "<tr class='Bordeado'>";
			echo "<td>";
			echo $Medicos->Clinica->Nombre;
			echo "</td>";
			echo "<td>";
			echo $Medicos->Clinica->Ubicacion->Domicilio;
			echo "</td>";
			echo "<td>";
			echo $Medicos->Nombre." ".$Medicos->Apellido;
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
		}
		else 
		{
			echo "No Se Encontraron Resultados";
		}
		echo "</div>";
		
	}
	?>
	</div>
</div>
</body>
</html>
