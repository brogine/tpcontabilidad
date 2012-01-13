<html>
<head>
<link href="../Commons/Header/Header.css" type="text/css" rel="stylesheet" />
<link href="../Commons/Footer/Footer.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/text.css" />
<link rel="stylesheet" type="text/css" media="all" href="../Commons/960.css" />
<link href="MenuClientes.css" type="text/css" rel="stylesheet" />
<script language="JavaScript" src="Ubicacion.js"></script>
<script language="JavaScript" src="Buscador.js"></script>
</head>

<body>
<?php include_once '../Commons/Header/Header.php';?>
<div id="Principal" class="container_12 MCPrincipal">
	<div id="Buscador" class="grid_10 prefix_1 suffix_1 Buscador">
		<form action="MenuClientes.php" method="POST">
			<div class="container_12">
			<div class="grid_4">
				<label for="TxtLocalidad" class="Label">Escriba La Ciudad en la que busca:
					<input class="TextBox" autocomplete="off" onkeyup="Buscar()" type="text" id="TxtLocalidad" name="TxtLocalidad">
				</label>
			</div>
			<div class="grid_4">
				<label for="CboEspecialidades" class="Label">Seleccione La Especialidad:
				<?php include '../../Servicio/especialidadservicio.php';
				$EspServ = new EspecialidadServicio();
				$listaEsp = $EspServ->Listar();
				//Lista De Especialidades
				echo "<select class='Combo' id='CboEspecialidades' name='CboEspecialidades'>";
			    	foreach ($listaEsp as $esp)
			    	{
			    		echo "<option value='".$esp->IdEspecialidad."'>".$esp->Nombre."</option>";	
			    	}
			    	echo "</select>";
				?>
				</label>
			</div>
			<div class="grid_2">
				<input type="submit" class="botonenviar" value="Buscar!">
			</div>
			</div>
		</form>
	</div>
 	<div class="grid_10 prefix_1 sufix_1 TurnosPendientes">
	<?php 
	if($_POST && count($_POST) > 0)
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
<?php include_once '../Commons/Footer/index.php'; ?>
</body>
</html>
